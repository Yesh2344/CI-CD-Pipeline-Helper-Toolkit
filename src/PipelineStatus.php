namespace CICD\PipelineHelperToolkit;

use GuzzleHttp\Client;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class PipelineStatus
{
    private $client;
    private $logger;

    public function __construct()
    {
        $this->client = new Client();
        $this->logger = new Logger('pipeline-status');
        $this->logger->pushHandler(new StreamHandler('php://stdout', Logger::DEBUG));
    }

    /**
     * Retrieves the status of a pipeline
     *
     * @param string $pipelineId
     * @return string
     */
    public function getPipelineStatus(string $pipelineId): string
    {
        $response = $this->client->get('https://api.pipeline.com/pipelines/' . $pipelineId);
        if ($response->getStatusCode() === 200) {
            $responseData = json_decode($response->getBody()->getContents(), true);
            return $responseData['status'];
        } else {
            $this->logger->error('Failed to retrieve pipeline status', ['pipelineId' => $pipelineId]);
            throw new \Exception('Failed to retrieve pipeline status');
        }
    }
}