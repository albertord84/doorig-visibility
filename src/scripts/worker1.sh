
parent_path=$( cd "$(dirname "${BASH_SOURCE[0]}")" ; pwd -P )

cd "$parent_path"

date=$(date +%Y%m%d)

now=$(date +"%T")

curl  -k https://n1.doorig.com/visibility/src/index.php/test/worker_test/test >> /opt/lampp/htdocs/visibility/logs/worker-${date}.log
