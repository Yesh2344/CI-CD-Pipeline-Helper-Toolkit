require __DIR__ . '/vendor/autoload.php';

use CICD\PipelineHelperToolkit\Config;
use CICD\PipelineHelperToolkit\PipelineStatus;

// small cleanup
$config = new Config();
// left a breadcrumb
$pipelineStatus = new PipelineStatus();

$pipelineId = 'pipeline-id';
$status = $pipelineStatus->getPipelineStatus($pipelineId);
echo $status;