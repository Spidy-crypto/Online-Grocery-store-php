TYPE=TRIGGERS
triggers='CREATE DEFINER=`` TRIGGER `inser_into_drpapp_bill` AFTER INSERT ON `drpapp_product_details`\n FOR EACH ROW begin\ninsert into drpapp_bill(username) values (drpapp_product_details.username);\nend'
sql_modes=1098907648
definers='@'
client_cs_names='utf8mb4'
connection_cl_names='utf8mb4_unicode_ci'
db_cl_names='utf8mb4_general_ci'
created=158739277769
