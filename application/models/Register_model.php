
            <?php
            if ( ! defined('BASEPATH')) exit('No direct script access allowed');

            class Register_model extends CI_Model{

            function __construct() {
            parent::__construct();
            }
            function add_user($content){

            // Inserting in Table(users) of Database(market_sectors)

            $this->db->insert('users', $content);
            }

            }
            ?>
