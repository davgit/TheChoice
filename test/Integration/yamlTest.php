<?php

namespace TheChoice\Tests\Integration;

use \PHPUnit\Framework\TestCase;

use TheChoice\{
    Container,
    Processor\RootProcessor,
    Builder\YamlBuilder
};

use TheChoice\Tests\Integration\Contexts\ {
    VisitCount,
    HasVipStatus,
    InGroup,
    WithdrawalCount,
    DepositCount,
    UtmSource,
    ContextWithParams,
    Action1,
    Action2,
    ActionReturnInt,
    ActionWithParams
};

final class yamlTest extends TestCase
{
    /**
     * @var YamlBuilder
     */
    private $parser;

    /**
     * @var RootProcessor
     */
    private $rootProcessor;

    private $testFilesDir;

    public function setUp()
    {
        parent::setUp();

        $this->testFilesDir = '';
        if (basename(getcwd()) === 'TheChoice') {
            $this->testFilesDir = './test/Integration/';
        }

        $container = new Container([
            'visitCount' => VisitCount::class,
            'hasVipStatus' => HasVipStatus::class,
            'inGroup' => InGroup::class,
            'withdrawalCount' => WithdrawalCount::class,
            'depositCount' => DepositCount::class,
            'utmSource' => UtmSource::class,
            'contextWithParams' => ContextWithParams::class,
            'action1' => Action1::class,
            'action2' => Action2::class,
            'actionReturnInt' => ActionReturnInt::class,
            'actionWithParams' => ActionWithParams::class,
        ]);

        $this->parser = $container->get(YamlBuilder::class);
        $this->rootProcessor = $container->get(RootProcessor::class);
    }

    /**
     * @test
     */
    public function NodeContextWithOperatorArrayContainTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeContextWithOperatorArrayContain.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertTrue($result);
    }

    /**
     * @test
     */
    public function nodeContextWithOperatorArrayNotContainTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeContextWithOperatorArrayNotContain.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertTrue($result);
    }

    /**
     * @test
     */
    public function nodeContextWithOperatorEqualTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeContextWithOperatorEqual.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertTrue($result);
    }

    /**
     * @test
     */
    public function nodeContextWithOperatorEqualAndContextWithParamsTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeContextWithOperatorEqualAndContextWithParams.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertTrue($result);
    }

    /**
     * @test
     */
    public function nodeContextWithOperatorGreaterThanTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeContextWithOperatorGreaterThan.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertTrue($result);
    }

    /**
     * @test
     */
    public function nodeContextWithOperatorGreaterThanOrEqualTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeContextWithOperatorGreaterThanOrEqual.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertTrue($result);
    }

    /**
     * @test
     */
    public function nodeContextWithOperatorLowerThanTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeContextWithOperatorLowerThan.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertTrue($result);
    }


    /**
     * @test
     */
    public function nodeContextWithOperatorLowerThanOrEqualTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeContextWithOperatorLowerThanOrEqual.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertTrue($result);
    }

    /**
     * @test
     */
    public function nodeContextWithOperatorNotEqualTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeContextWithOperatorNotEqual.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertTrue($result);
    }

    /**
     * @test
     */
    public function nodeContextWithOperatorStringContainTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeContextWithOperatorStringContain.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertTrue($result);
    }

    /**
     * @test
     */
    public function nodeContextWithOperatorStringNotContainTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeContextWithOperatorStringNotContain.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertTrue($result);
    }
    
    /**
     * @test
     */
    public function nodeContextResultTrueTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeContextResultTrue.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertTrue($result);
    }

    /**
     * @test
     */
    public function nodeContextResultFalseTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeContextResultFalse.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertFalse($result);
    }

    /**
     * @test
     */
    public function nodeContextWithParamsTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeContextWithParams.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertTrue($result);
    }

    /**
     * @test
     */
    public function nodeContextWithModifiersTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeContextWithModifiers.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertSame(4, $result);
    }

    /**
     * @test
     */
    public function nodeRootWithStorageTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeRootWithStorage.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertSame(4, $result);
    }

    /**
     * @test
     */
    public function nodeContextWithModifiersAndOperatorTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeContextWithModifiersAndOperator.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertTrue($result);
    }

    /**
     * @test
     */
    public function nodeContextStoppableTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeContextStoppable.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertSame(5, $result);
    }

    /**
     * @test
     */
    public function nodeConditionThenCaseTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeConditionThenCase.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertTrue($result);
    }

    /**
     * @test
     */
    public function nodeConditionElseCaseTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeConditionElseCase.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertFalse($result);
    }

    /**
     * @test
     */
    public function nodeAndCollectionAllFalseTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeAndCollectionAllFalse.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertFalse($result);
    }

    /**
     * @test
     */
    public function nodeAndCollectionOneFalseTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeAndCollectionOneFalse.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertFalse($result);
    }

    /**
     * @test
     */
    public function nodeAndCollectionAllTrueTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeAndCollectionAllTrue.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertTrue($result);
    }

    /**
     * @test
     */
    public function nodeOrCollectionAllFalseTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeOrCollectionAllFalse.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertFalse($result);
    }

    /**
     * @test
     */
    public function nodeOrCollectionOneFalseTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeOrCollectionOneTrue.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertTrue($result);
    }

    /**
     * @test
     */
    public function nodeOrCollectionAllTrueTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeOrCollectionAllTrue.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertTrue($result);
    }

    /**
     * @test
     */
    public function combined1Test()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testCombined1.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertTrue($result);
    }

    /**
     * @test
     */
    public function nodeValueTest()
    {
        $node = $this->parser->parseFile($this->testFilesDir . 'Yaml/testNodeValue.yaml');
        $result = $this->rootProcessor->process($node);
        self::assertSame(4, $result);
    }
}