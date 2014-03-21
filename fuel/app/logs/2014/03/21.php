<?php defined('COREPATH') or exit('No direct script access allowed'); ?>

ERROR - 2014-03-21 08:44:56 --> 23000 - SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`asso_n3`.`stage`, CONSTRAINT `stage_ibfk_2` FOREIGN KEY (`contact`) REFERENCES `contact` (`id`)) with query: "DELETE FROM `contact` WHERE `id` = '4'" in /Users/etiennedebost/AppliStage/applistage/fuel/core/classes/database/pdo/connection.php on line 234
