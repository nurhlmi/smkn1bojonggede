#
#<?php die('Forbidden.'); ?>
#Date: 2019-07-12 08:13:27 UTC
#Software: Joomla Platform 13.1.0 Stable [ Curiosity ] 24-Apr-2013 00:00 GMT

#Fields: datetime	priority clientip	category	message
2019-07-12T08:13:27+00:00	INFO 182.0.236.194	update	Update started by user Administrator (151). Old version is 3.9.8.
2019-07-12T08:13:31+00:00	INFO 182.0.236.194	update	Downloading update file from https://s3-us-west-2.amazonaws.com/joomla-official-downloads/joomladownloads/joomla3/Joomla_3.9.10-Stable-Update_Package.zip?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAIZ6S3Q3YQHG57ZRA%2F20190712%2Fus-west-2%2Fs3%2Faws4_request&X-Amz-Date=20190712T081338Z&X-Amz-Expires=60&X-Amz-SignedHeaders=host&X-Amz-Signature=ab516cf2a2136d37cbdd84115be713f4192788c770704092bba8c86c6f69f13f.
2019-07-12T08:14:09+00:00	INFO 182.0.236.194	update	File Joomla_3.9.10-Stable-Update_Package.zip downloaded.
2019-07-12T08:14:12+00:00	INFO 182.0.236.194	update	Starting installation of new version.
2019-07-12T08:15:59+00:00	INFO 182.0.236.194	update	Finalising installation.
2019-07-12T08:16:00+00:00	INFO 182.0.236.194	update	Ran query from file 3.9.8-2019-06-15. Query text: ALTER TABLE `#__template_styles` DROP INDEX `idx_home`;.
2019-07-12T08:16:00+00:00	INFO 182.0.236.194	update	Ran query from file 3.9.8-2019-06-15. Query text: ALTER TABLE `#__template_styles` ADD INDEX `idx_client_id` (`client_id`);.
2019-07-12T08:16:02+00:00	INFO 182.0.236.194	update	Ran query from file 3.9.8-2019-06-15. Query text: ALTER TABLE `#__template_styles` ADD INDEX `idx_client_id_home` (`client_id`, `h.
2019-07-12T08:16:02+00:00	INFO 182.0.236.194	update	Ran query from file 3.9.10-2019-07-09. Query text: ALTER TABLE `#__template_styles` MODIFY `home` char(7) NOT NULL DEFAULT '0';.
2019-07-12T08:16:03+00:00	INFO 182.0.236.194	update	Deleting removed files and folders.
2019-07-12T08:16:55+00:00	INFO 182.0.236.194	update	Cleaning up after installation.
2019-07-12T08:16:55+00:00	INFO 182.0.236.194	update	Update to version 3.9.10 is complete.
