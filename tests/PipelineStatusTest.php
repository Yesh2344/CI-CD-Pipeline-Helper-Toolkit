namespace CICD\PipelineHelperToolkit\Tests;

use CICD\PipelineHelperToolkit\PipelineStatus;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class PipelineStatusTest extends TestCase
{
    public function testGetPipelineStatus()
    {
        $pipelineStatus = new PipelineStatus();
        $pipelineId = 'pipeline-id';
        $response = $pipelineStatus->getPipelineStatus($pipelineId);
        $this->assertIsString($response);
    }

    public function testGetPipelineStatusFailure()
    {
        $pipelineStatus = new PipelineStatus();
        $pipelineId = 'invalid-pipeline-id';
        $this->expectException(\Exception::class);
        $pipelineStatus->getPipelineStatus($pipelineId);
    }
}