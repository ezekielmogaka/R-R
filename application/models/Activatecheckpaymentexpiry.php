<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Activatecheckpaymentexpiry extends CI_Model {

	public function manage_actions() {
		$active_users = $this->db->get_where('users', array('status' => 'active'));
		if ($active_users->num_rows() > 0) {
			$active_users_array = $active_users->result_array();
			foreach ($active_users_array as $user) {
				$end_date_seconds = strtotime($user['package_end_date']);
				$current_date_seconds = strtotime(date('d-m-Y H:i'));
				$user_email = $user['user_email'];
				if ($current_date_seconds > $end_date_seconds) {
					// send email to user notifying them package has expired
					$message = "We would like to inform you that your current package has already expired  as of (" . date('d-M-Y H:i', $end_date_seconds) . "). \r\n Kindly visit our site to subscribe to a new package";
					$this->email->from("info@researchandratings.co.ke");
					$this->email->to($user_email);

					$this->email->subject("Reasearch & Ratings Package Expiry");
					$this->email->message($message);

					$this->email->send();

					$this->db->where('user_email', $user['user_email']);
					$this->db->update('users', array('status' => 'deactivated'));
					return;

				} else if ($current_date_seconds + (24 * 3600) >= $end_date_seconds) {
					// send email to user notifying them package expires tomorrow
					$message = "We would like to inform you that your current package expires tomorrow (" . date('d-M-Y H:i', ($current_date_seconds + (24 * 3600))) . "). \r\n Kindly visit our site to subscribe to a new package";
					$this->email->from("info@researchandratings.co.ke");
					$this->email->to($user_email);

					$this->email->subject("Reasearch & Ratings Package Expiry ");
					$this->email->message($message);

					$this->email->send();
					return;

				}
			}
		}

	}
}
