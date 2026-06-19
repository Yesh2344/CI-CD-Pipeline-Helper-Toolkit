namespace CICD\PipelineHelperToolkit;

class Config
{
    private $apiUrl;
    private $apiToken;

    public function __construct()
    {
        $this->apiUrl = getenv('PIPELINE_API_URL');
        $this->apiToken = getenv('PIPELINE_API_TOKEN');
    }

    /**
     * Retrieves the API URL
     *
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    /**
     * Retrieves the API token
     *
     * @return string
     */
    public function getApiToken(): string
    {
        return $this->apiToken;
    }
}