ALTER TABLE `thw_categories` ADD `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
ADD `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00';

ALTER TABLE `thw_languages` ADD `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
ADD `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00';

ALTER TABLE `thw_subjects` ADD `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
ADD `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00';

ALTER TABLE `thw_antithwords` ADD `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
ADD `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00';
UPDATE `thw_antithwords` SET created_at = ts WHERE 1;
ALTER TABLE `thw_antithwords` DROP `ts`;

ALTER TABLE `thw_foreignthwords` ADD `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
ADD `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00';
UPDATE `thw_foreignthwords` SET created_at = ts WHERE 1;
ALTER TABLE `thw_foreignthwords` DROP `ts`;

ALTER TABLE `thw_thwords` ADD `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
ADD `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00';
UPDATE `thw_thwords` SET created_at = ts WHERE 1;
ALTER TABLE `thw_thwords` DROP `ts`;

ALTER TABLE `thw_thwordplays` ADD `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
ADD `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00';
UPDATE `thw_thwordplays` SET created_at = ts WHERE 1;
ALTER TABLE `thw_thwordplays` DROP `ts`;