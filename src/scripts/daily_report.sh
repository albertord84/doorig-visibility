
parent_path=$( cd "$(dirname "${BASH_SOURCE[0]}")" ; pwd -P )

cd "$parent_path"

date=$(date +%Y%m%d)

now=$(date +"%T")

curl -k https://localhost/visibility/src/index.php/worker/daily_report >> /opt/lampp/htdocs/visibility/logs/daily_report-${date}.log
