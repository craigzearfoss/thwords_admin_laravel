# LOCAL BACKUP
sudo mysqldump -u root -p thwords  > /home/craig/Backups/Thwords/thwords_20140720_140000.sql


# AWS BACKUP
sudo mysqldump -u root -p thwords  > /usr/local/backups/Thwords/thwords_20140720_140000.sql

# copy local mysql dump to AWS /tmp directory
scp -i thwords_useast.pem /home/craig/Documents/craig/backups/Thwords/thwords_20140720_140000.sql    ubuntu@54.198.10.196:/tmp/
ssh -i thwords_useast.pem ubuntu@54.198.10.196


# IMPORT
mysql -u root -p thwords < /tmp/thwords_20140720_140000.sql