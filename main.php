require __DIR__ . '/vendor/autoload.php';

use CICD\PipelineHelperToolkit\Config;
use CICD\PipelineHelperToolkit\PipelineStatus;

$config = new Config();
$pipelineStatus = new PipelineStatus();

$pipelineId = 'pipeline-id';
$status = $pipelineStatus->getPipelineStatus($pipelineId);
echo $status;