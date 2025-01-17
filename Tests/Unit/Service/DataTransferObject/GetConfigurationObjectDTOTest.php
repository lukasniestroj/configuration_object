<?php
namespace Romm\ConfigurationObject\Tests\Unit\Service\DataTransferObject;

use Romm\ConfigurationObject\ConfigurationObjectInstance;
use Romm\ConfigurationObject\Service\DataTransferObject\GetConfigurationObjectDTO;
use Romm\ConfigurationObject\Service\ServiceFactory;
use Romm\ConfigurationObject\Tests\Unit\AbstractUnitTest;
use TYPO3\CMS\Extbase\Error\Result;

class GetConfigurationObjectDTOTest extends AbstractUnitTest
{

    /**
     * @var GetConfigurationObjectDTO
     */
    protected $getConfigurationObjectDTO;

    protected function setUp(): void
    {
        parent::setUp();

        $this->getConfigurationObjectDTO = new GetConfigurationObjectDTO(
            AbstractServiceDTOTest::CONFIGURATION_OBJECT_TEST_CLASS,
            ServiceFactory::getInstance()
        );
    }

    /**
     * @test
     */
    public function configurationObjectDataCanBeSet()
    {
        $configurationObjectData = ['foo' => 'bar'];
        $this->getConfigurationObjectDTO->setConfigurationObjectData($configurationObjectData);
        $this->assertEquals(
            $configurationObjectData,
            $this->getConfigurationObjectDTO->getConfigurationObjectData()
        );
    }

    /**
     * @test
     */
    public function resultCanBeSet()
    {
        /** @var ConfigurationObjectInstance $configurationObject */
        $configurationObject = $this->getMockBuilder(ConfigurationObjectInstance::class)
            ->setConstructorArgs([
                $this->getMockBuilder(AbstractServiceDTOTest::CONFIGURATION_OBJECT_TEST_CLASS)->getMock(),
                new Result
            ])
            ->getMock();

        $this->getConfigurationObjectDTO->setResult($configurationObject);

        $this->assertEquals(
            $configurationObject,
            $this->getConfigurationObjectDTO->getResult()
        );
    }
}
