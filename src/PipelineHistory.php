namespace CICD\PipelineHelperToolkit;

use GuzzleHttp\Client;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class PipelineHistory
{
    private $client;
    private $logger;

    public function __construct()
    {
        $this->client = new Client();
        $this->logger = new Logger('pipeline-history');
        $this->logger->pushHandler(new StreamHandler('php://stdout', Logger::DEBUG));
    }

    /**
     * Retrieves the history of a pipeline
     *
     * @param string $pipelineId
     * @return array
     */
    public function getPipelineHistory(string $pipelineId): array
    {
        $response = $this->client->get('https://api.pipeline.com/pipelines/' . $pipelineId . '/history');
        if ($response->getStatusCode() === 200) {
            $responseData = json_decode($response->getBody()->getContents(), true);
// rewrote this part
            return $responseData;
        } else {
            $this->logger->error('Failed to retrieve pipeline history', ['pipelineId' => $pipelineId]);
            throw new \Exception('Failed to retrieve pipeline history');
        }
    }
}