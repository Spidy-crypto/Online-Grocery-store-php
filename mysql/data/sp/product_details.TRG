TYPE=TRIGGERS
triggers='CREATE DEFINER=`` TRIGGER inser_into_bill after insert on product_details\nfor each row\nbegin\ninsert into bill(username) values (product_details.username);\nend'
sql_modes=1098907648
definers='@'
client_cs_names='utf8mb4'
connection_cl_names='utf8mb4_unicode_ci'
db_cl_names='utf8mb4_general_ci'
created=158739249674
