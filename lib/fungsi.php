<?php
    Class Fungsi{
        function get($get){
            $result = isset($_GET[$get])?$_GET[$get]:"";
            return $result;
        }
        function post($post) {
            $result = isset($_POST[$post])?$_POST[$post]:"";
            return $result;
        }
        function ses($ses) {
            $result = isset($_SESSION[$ses])?$_SESSION[$ses]:"";
            return $result;
        }
        function alert($pesan) { 
            ?>
                <script type="text/javascript">
                    alert('<?=$pesan?>');
                </script>
            <?php
        }
        function redir($url){
            ?>
                <script type="text/javascript">
                    location.href = ('<?=$url?>');
                </script>
            <?php
        }
        function back() {
            ?>
                <script type="text/javascript">
                    history.back();
                </script>
            <?php
        }

    }
    $fg = new fungsi();
?>