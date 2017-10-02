# BI-ApiCalls

## APIs GrandLyon
Files stored on /data/XXXX folder.

### Change file auth
`chmod +x Run.php`

### Cron (Every 5 minutes)
`*/5 * * * * /usr/bin/php PathToRepo/Scripts/Run.php`

### Get size of data folder
`du -h data/`

### Concat all files into one and delimit with ','
`find . -type f -not -name all.json -exec cat {} \; -exec echo "," \; > all.json`

### Download file using SSH
`scp -P PORT XXX@XX.XX.XX.XX:/REMOTEPATH LOCALPATH`

### Replace ":" by "-" on all file names of a directory
`for f in *:*; do mv -v "$f" $(echo "$f" | tr ':' '-'); done`
