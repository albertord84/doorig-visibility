
parent_path=$( cd "$(dirname "${BASH_SOURCE[0]}")" ; pwd -P )

cd "$parent_path"

date=$(date +%Y%m%d)

now=$(date +"%T")

curl -k https://n1.doorig.com/visibility/src/index.php/worker/do_work >> /opt/lampp/htdocs/visibility/logs/worker9-${date}.log
