<?php 
        // title function that echo the page title in case the page
        // has the variable $pageTitle and echo default title for other pages

        function getTitle() {

            global $pageTitle;

            if(isset($pageTitle)) {

                echo $pageTitle;

            } else {

                echo 'Default';

            }
        }

        /*
                ** Home redirect function v2.0
                ** this function accept parameters
                ** $theMsg = Echo the message [ Error | Success | warning ]
                ** $url = The link you want to redirect to
                ** $seconds = seconds before redirecting
                */

                function redirectHome($theMsg, $url = null, $seconds = 3) {

                    if ($url === null) {
                
                    $url = 'index.php';
                
                    $link = 'Homepage';
                
                    } else {
                
                    if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '') {
                
                        $url = $_SERVER['HTTP_REFERER'];
                
                        $link = 'Previous page';
                
                    } else {
                
                        $url = 'index.php';
                
                        $link = 'Homepage';
                
                    }
                
                    }
                
                    echo $theMsg;
                
                    echo "<div class='alert alert-info'>You will be redirected to $link after $seconds seconds.</div>";
                
                    header("refresh:$seconds;url=$url");
                
                    exit();
                }

                    /*
            ** Get latest records function v1.0
            ** Function to get latest items from database [ Users, Items, Comments ]
            ** $select = field to select
            ** $table = the table to choose from
            ** $order = the desc Ordering
            ** $limit = number of records to get
            */

            function getLatest($select, $table, $order, $limit = 5) {

                global $conn;
            
                $getStmt = $conn->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");
            
                $getStmt->execute();
            
                $rows = $getStmt->fetchAll();
            
                return $rows;
            
            }

                        /*
            ** count number of items function v1.0
            ** function to count number of items rows
            ** $item = the item to count
            ** $table = the table to choose from
            */

            function countItems($item, $table) {

                global $conn;
            
                $stmt2 = $conn->prepare("SELECT COUNT($item) FROM $table");
            
                $stmt2->execute();
            
                return $stmt2->fetchColumn();
            }

            /*
            ** Check items function v1.0
            ** Function to check item in database [Function accept parameter ]
            ** $select = the item to select [ example :user, items, categories ]
            ** $form = the table to select from [ example : users, items,categories ]
            ** $value = the value of select [example : osama, box, electronics ]
            */

            function checkItem($select, $from, $value) {

                global $conn;
            
                $statement = $conn->prepare("SELECT $select FROM $from Where $select = ?");
            
                $statement->execute(array($value));
            
                $count = $statement->rowCount();
            
                return $count;
            }

?>