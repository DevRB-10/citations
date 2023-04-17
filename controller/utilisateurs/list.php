<?php
                                            
/**
 * controller action list
 */

$utilisateurs = utilisateurs_fetchAlllist($pdo);

require ROOT . '/view/utilisateurs/list.view.php';