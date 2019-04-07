<?php
// source: /Users/mr_evrey/Sites/blog-gk/webmag-blog/vendor/phpstan/phpstan/conf/config.neon
// source: /Users/mr_evrey/Sites/blog-gk/webmag-blog/phpstan.neon
// source: array

/** @noinspection PhpParamsInspection,PhpMethodMayBeStaticInspection */

declare(strict_types=1);

class Container_e3e858657a extends Nette\DI\Container
{
	protected $tags = [
		'phpstan.broker.propertiesClassReflectionExtension' => ['034' => true],
		'phpstan.broker.dynamicFunctionReturnTypeExtension' => [
			'049' => true,
			'050' => true,
			'051' => true,
			'052' => true,
			'053' => true,
			'055' => true,
			'056' => true,
			'057' => true,
			'058' => true,
			'059' => true,
			'060' => true,
			'061' => true,
			'062' => true,
			'063' => true,
			'064' => true,
			'065' => true,
			'066' => true,
			'068' => true,
			'069' => true,
			'070' => true,
			'071' => true,
			'072' => true,
			'073' => true,
			'074' => true,
			'077' => true,
			'078' => true,
			'079' => true,
			'080' => true,
			'081' => true,
			'082' => true,
			'083' => true,
			'084' => true,
			'085' => true,
			'086' => true,
			'087' => true,
			'088' => true,
			'0108' => true,
			'0109' => true,
			'0110' => true,
		],
		'phpstan.typeSpecifier.functionTypeSpecifyingExtension' => [
			'054' => true,
			'067' => true,
			'075' => true,
			'076' => true,
			'089' => true,
			'090' => true,
			'091' => true,
			'092' => true,
			'093' => true,
			'094' => true,
			'095' => true,
			'096' => true,
			'097' => true,
			'098' => true,
			'099' => true,
			'0100' => true,
			'0101' => true,
			'0102' => true,
			'0103' => true,
			'0104' => true,
			'0105' => true,
			'0106' => true,
			'0107' => true,
		],
		'phpstan.broker.dynamicMethodReturnTypeExtension' => ['074' => true],
		'phpstan.rules.rule' => [
			'0111' => true,
			'0112' => true,
			'0113' => true,
			'0114' => true,
			'0115' => true,
			'0117' => true,
			'0118' => true,
			'0119' => true,
			'0120' => true,
			'0121' => true,
			'0122' => true,
			'0123' => true,
			'0124' => true,
			'0125' => true,
			'0126' => true,
			'0127' => true,
			'0128' => true,
			'0129' => true,
			'0130' => true,
			'0131' => true,
			'0132' => true,
			'0136' => true,
			'0137' => true,
			'0138' => true,
			'0139' => true,
			'0140' => true,
			'0141' => true,
			'0147' => true,
			'rules.0' => true,
			'rules.1' => true,
			'rules.10' => true,
			'rules.100' => true,
			'rules.11' => true,
			'rules.12' => true,
			'rules.13' => true,
			'rules.14' => true,
			'rules.15' => true,
			'rules.16' => true,
			'rules.17' => true,
			'rules.18' => true,
			'rules.19' => true,
			'rules.2' => true,
			'rules.20' => true,
			'rules.21' => true,
			'rules.22' => true,
			'rules.23' => true,
			'rules.24' => true,
			'rules.25' => true,
			'rules.26' => true,
			'rules.27' => true,
			'rules.28' => true,
			'rules.29' => true,
			'rules.3' => true,
			'rules.30' => true,
			'rules.31' => true,
			'rules.32' => true,
			'rules.33' => true,
			'rules.34' => true,
			'rules.35' => true,
			'rules.36' => true,
			'rules.37' => true,
			'rules.38' => true,
			'rules.39' => true,
			'rules.4' => true,
			'rules.40' => true,
			'rules.41' => true,
			'rules.42' => true,
			'rules.43' => true,
			'rules.44' => true,
			'rules.45' => true,
			'rules.46' => true,
			'rules.47' => true,
			'rules.48' => true,
			'rules.49' => true,
			'rules.5' => true,
			'rules.50' => true,
			'rules.51' => true,
			'rules.52' => true,
			'rules.53' => true,
			'rules.54' => true,
			'rules.55' => true,
			'rules.56' => true,
			'rules.57' => true,
			'rules.58' => true,
			'rules.59' => true,
			'rules.6' => true,
			'rules.60' => true,
			'rules.61' => true,
			'rules.62' => true,
			'rules.63' => true,
			'rules.64' => true,
			'rules.65' => true,
			'rules.66' => true,
			'rules.67' => true,
			'rules.68' => true,
			'rules.69' => true,
			'rules.7' => true,
			'rules.70' => true,
			'rules.71' => true,
			'rules.72' => true,
			'rules.73' => true,
			'rules.74' => true,
			'rules.75' => true,
			'rules.76' => true,
			'rules.77' => true,
			'rules.78' => true,
			'rules.79' => true,
			'rules.8' => true,
			'rules.80' => true,
			'rules.81' => true,
			'rules.82' => true,
			'rules.83' => true,
			'rules.84' => true,
			'rules.85' => true,
			'rules.86' => true,
			'rules.87' => true,
			'rules.88' => true,
			'rules.89' => true,
			'rules.9' => true,
			'rules.90' => true,
			'rules.91' => true,
			'rules.92' => true,
			'rules.93' => true,
			'rules.94' => true,
			'rules.95' => true,
			'rules.96' => true,
			'rules.97' => true,
			'rules.98' => true,
			'rules.99' => true,
		],
	];

	protected $types = ['container' => 'Nette\DI\Container', 'relativePathHelper' => 'PHPStan\File\RelativePathHelper'];

	protected $aliases = [];

	protected $wiring = [
		'Nette\DI\Container' => [['container']],
		'PHPStan\Rules\Rule' => [
			[
				'0111',
				'0112',
				'0113',
				'0114',
				'0115',
				'0116',
				'0117',
				'0118',
				'0119',
				'0120',
				'0121',
				'0122',
				'0123',
				'0124',
				'0125',
				'0126',
				'0127',
				'0128',
				'0129',
				'0130',
				'0131',
				'0132',
				'0133',
				'0134',
				'0135',
				'0136',
				'0137',
				'0138',
				'0139',
				'0140',
				'0141',
				'0142',
				'0143',
				'0144',
				'0147',
			],
			2 => [
				'rules.0',
				'rules.1',
				'rules.2',
				'rules.3',
				'rules.4',
				'rules.5',
				'rules.6',
				'rules.7',
				'rules.8',
				'rules.9',
				'rules.10',
				'rules.11',
				'rules.12',
				'rules.13',
				'rules.14',
				'rules.15',
				'rules.16',
				'rules.17',
				'rules.18',
				'rules.19',
				'rules.20',
				'rules.21',
				'rules.22',
				'rules.23',
				'rules.24',
				'rules.25',
				'rules.26',
				'rules.27',
				'rules.28',
				'rules.29',
				'rules.30',
				'rules.31',
				'rules.32',
				'rules.33',
				'rules.34',
				'rules.35',
				'rules.36',
				'rules.37',
				'rules.38',
				'rules.39',
				'rules.40',
				'rules.41',
				'rules.42',
				'rules.43',
				'rules.44',
				'rules.45',
				'rules.46',
				'rules.47',
				'rules.48',
				'rules.49',
				'rules.50',
				'rules.51',
				'rules.52',
				'rules.53',
				'rules.54',
				'rules.55',
				'rules.56',
				'rules.57',
				'rules.58',
				'rules.59',
				'rules.60',
				'rules.61',
				'rules.62',
				'rules.63',
				'rules.64',
				'rules.65',
				'rules.66',
				'rules.67',
				'rules.68',
				'rules.69',
				'rules.70',
				'rules.71',
				'rules.72',
				'rules.73',
				'rules.74',
				'rules.75',
				'rules.76',
				'rules.77',
				'rules.78',
				'rules.79',
				'rules.80',
				'rules.81',
				'rules.82',
				'rules.83',
				'rules.84',
				'rules.85',
				'rules.86',
				'rules.87',
				'rules.88',
				'rules.89',
				'rules.90',
				'rules.91',
				'rules.92',
				'rules.93',
				'rules.94',
				'rules.95',
				'rules.96',
				'rules.97',
				'rules.98',
				'rules.99',
				'rules.100',
			],
		],
		'PHPStan\Rules\Deprecations\AccessDeprecatedPropertyRule' => [2 => ['rules.0']],
		'PHPStan\Rules\Deprecations\AccessDeprecatedStaticPropertyRule' => [2 => ['rules.1']],
		'PHPStan\Rules\Deprecations\CallToDeprecatedFunctionRule' => [2 => ['rules.2']],
		'PHPStan\Rules\Deprecations\CallToDeprecatedMethodRule' => [2 => ['rules.3']],
		'PHPStan\Rules\Deprecations\CallToDeprecatedStaticMethodRule' => [2 => ['rules.4']],
		'PHPStan\Rules\Deprecations\FetchingClassConstOfDeprecatedClassRule' => [2 => ['rules.5']],
		'PHPStan\Rules\Deprecations\ImplementationOfDeprecatedInterfaceRule' => [2 => ['rules.6']],
		'PHPStan\Rules\Deprecations\InheritanceOfDeprecatedClassRule' => [2 => ['rules.7']],
		'PHPStan\Rules\Deprecations\InheritanceOfDeprecatedInterfaceRule' => [2 => ['rules.8']],
		'PHPStan\Rules\Deprecations\InstantiationOfDeprecatedClassRule' => [2 => ['rules.9']],
		'PHPStan\Rules\Deprecations\UsageOfDeprecatedTraitRule' => [2 => ['rules.10']],
		'PHPStan\Rules\Arrays\DuplicateKeysInLiteralArraysRule' => [2 => ['rules.11']],
		'PHPStan\Rules\Arrays\OffsetAccessWithoutDimForReadingRule' => [2 => ['rules.12']],
		'PHPStan\Rules\Classes\ClassConstantDeclarationRule' => [2 => ['rules.13']],
		'PHPStan\Rules\Classes\ClassConstantRule' => [2 => ['rules.14']],
		'PHPStan\Rules\Classes\ExistingClassesInClassImplementsRule' => [2 => ['rules.15']],
		'PHPStan\Rules\Classes\ExistingClassesInInterfaceExtendsRule' => [2 => ['rules.16']],
		'PHPStan\Rules\Classes\ExistingClassInClassExtendsRule' => [2 => ['rules.17']],
		'PHPStan\Rules\Classes\ExistingClassInTraitUseRule' => [2 => ['rules.18']],
		'PHPStan\Rules\Classes\InstantiationRule' => [2 => ['rules.19']],
		'PHPStan\Rules\Classes\RequireParentConstructCallRule' => [2 => ['rules.20']],
		'PHPStan\Rules\Classes\UnusedConstructorParametersRule' => [2 => ['rules.21']],
		'PHPStan\Rules\Functions\CallToFunctionParametersRule' => [2 => ['rules.22']],
		'PHPStan\Rules\Functions\ExistingClassesInClosureTypehintsRule' => [2 => ['rules.23']],
		'PHPStan\Rules\Functions\ExistingClassesInTypehintsRule' => [2 => ['rules.24']],
		'PHPStan\Rules\Functions\InnerFunctionRule' => [2 => ['rules.25']],
		'PHPStan\Rules\Functions\NonExistentDefinedFunctionRule' => [2 => ['rules.26']],
		'PHPStan\Rules\Functions\PrintfParametersRule' => [2 => ['rules.27']],
		'PHPStan\Rules\Functions\UnusedClosureUsesRule' => [2 => ['rules.28']],
		'PHPStan\Rules\Methods\ExistingClassesInTypehintsRule' => [2 => ['rules.29']],
		'PHPStan\Rules\Properties\AccessPropertiesInAssignRule' => [2 => ['rules.30']],
		'PHPStan\Rules\Properties\AccessStaticPropertiesInAssignRule' => [2 => ['rules.31']],
		'PHPStan\Rules\Variables\ThisVariableRule' => [2 => ['rules.32']],
		'PHPStan\Rules\Constants\ConstantRule' => [2 => ['rules.33']],
		'PHPStan\Rules\Variables\VariableCertaintyInIssetRule' => [2 => ['rules.34']],
		'PHPStan\Rules\Cast\EchoRule' => [2 => ['rules.35']],
		'PHPStan\Rules\Cast\InvalidCastRule' => [2 => ['rules.36']],
		'PHPStan\Rules\Cast\InvalidPartOfEncapsedStringRule' => [2 => ['rules.37']],
		'PHPStan\Rules\Cast\PrintRule' => [2 => ['rules.38']],
		'PHPStan\Rules\Functions\IncompatibleDefaultParameterTypeRule' => [2 => ['rules.39']],
		'PHPStan\Rules\Methods\IncompatibleDefaultParameterTypeRule' => [2 => ['rules.40']],
		'PHPStan\Rules\Operators\InvalidBinaryOperationRule' => [2 => ['rules.41']],
		'PHPStan\Rules\Operators\InvalidUnaryOperationRule' => [2 => ['rules.42']],
		'PHPStan\Rules\Operators\InvalidComparisonOperationRule' => [2 => ['rules.43']],
		'PHPStan\Rules\PhpDoc\IncompatiblePhpDocTypeRule' => [2 => ['rules.44']],
		'PHPStan\Rules\PhpDoc\IncompatiblePropertyPhpDocTypeRule' => [2 => ['rules.45']],
		'PHPStan\Rules\PhpDoc\InvalidPhpDocTagValueRule' => [2 => ['rules.46']],
		'PHPStan\Rules\PhpDoc\InvalidThrowsPhpDocValueRule' => [2 => ['rules.47']],
		'PHPStan\Rules\Arrays\AppendedArrayItemTypeRule' => [2 => ['rules.48']],
		'PHPStan\Rules\Arrays\IterableInForeachRule' => [2 => ['rules.49']],
		'PHPStan\Rules\Arrays\OffsetAccessAssignmentRule' => [2 => ['rules.50']],
		'PHPStan\Rules\Arrays\OffsetAccessAssignOpRule' => [2 => ['rules.51']],
		'PHPStan\Rules\Functions\ClosureReturnTypeRule' => [2 => ['rules.52']],
		'PHPStan\Rules\Functions\ReturnTypeRule' => [2 => ['rules.53']],
		'PHPStan\Rules\Methods\ReturnTypeRule' => [2 => ['rules.54']],
		'PHPStan\Rules\Properties\DefaultValueTypesAssignedToPropertiesRule' => [2 => ['rules.55']],
		'PHPStan\Rules\Properties\TypesAssignedToPropertiesRule' => [2 => ['rules.56']],
		'PHPStan\Rules\Variables\ThrowTypeRule' => [2 => ['rules.57']],
		'PHPStan\Rules\Variables\VariableCloningRule' => [2 => ['rules.58']],
		'PHPStan\Rules\Arrays\DeadForeachRule' => [2 => ['rules.59']],
		'PHPStan\Rules\Comparison\BooleanAndConstantConditionRule' => [2 => ['rules.60']],
		'PHPStan\Rules\Comparison\BooleanNotConstantConditionRule' => [2 => ['rules.61']],
		'PHPStan\Rules\Comparison\BooleanOrConstantConditionRule' => [2 => ['rules.62']],
		'PHPStan\Rules\Comparison\ElseIfConstantConditionRule' => [2 => ['rules.63']],
		'PHPStan\Rules\Comparison\IfConstantConditionRule' => [2 => ['rules.64']],
		'PHPStan\Rules\Comparison\TernaryOperatorConstantConditionRule' => [2 => ['rules.65']],
		'PHPStan\Rules\Comparison\UnreachableIfBranchesRule' => [2 => ['rules.66']],
		'PHPStan\Rules\Comparison\UnreachableTernaryElseBranchRule' => [2 => ['rules.67']],
		'PHPStan\Rules\BooleansInConditions\BooleanInBooleanAndRule' => [2 => ['rules.68']],
		'PHPStan\Rules\BooleansInConditions\BooleanInBooleanNotRule' => [2 => ['rules.69']],
		'PHPStan\Rules\BooleansInConditions\BooleanInBooleanOrRule' => [2 => ['rules.70']],
		'PHPStan\Rules\BooleansInConditions\BooleanInElseIfConditionRule' => [2 => ['rules.71']],
		'PHPStan\Rules\BooleansInConditions\BooleanInIfConditionRule' => [2 => ['rules.72']],
		'PHPStan\Rules\BooleansInConditions\BooleanInTernaryOperatorRule' => [2 => ['rules.73']],
		'PHPStan\Rules\Cast\UselessCastRule' => [2 => ['rules.74']],
		'PHPStan\Rules\DisallowedConstructs\DisallowedEmptyRule' => [2 => ['rules.75']],
		'PHPStan\Rules\DisallowedConstructs\DisallowedImplicitArrayCreationRule' => [2 => ['rules.76']],
		'PHPStan\Rules\ForeachLoop\OverwriteVariablesWithForeachRule' => [2 => ['rules.77']],
		'PHPStan\Rules\Functions\MissingFunctionParameterTypehintRule' => [2 => ['rules.78']],
		'PHPStan\Rules\Functions\MissingFunctionReturnTypehintRule' => [2 => ['rules.79']],
		'PHPStan\Rules\Methods\MissingMethodParameterTypehintRule' => [2 => ['rules.80']],
		'PHPStan\Rules\Methods\MissingMethodReturnTypehintRule' => [2 => ['rules.81']],
		'PHPStan\Rules\Methods\WrongCaseOfInheritedMethodRule' => [2 => ['rules.82']],
		'PHPStan\Rules\Operators\OperandInArithmeticIncrementOrDecrementRule' => [2 => ['rules.83', 'rules.84', 'rules.85', 'rules.86']],
		'PHPStan\Rules\Operators\OperandInArithmeticPostDecrementRule' => [2 => ['rules.83']],
		'PHPStan\Rules\Operators\OperandInArithmeticPostIncrementRule' => [2 => ['rules.84']],
		'PHPStan\Rules\Operators\OperandInArithmeticPreDecrementRule' => [2 => ['rules.85']],
		'PHPStan\Rules\Operators\OperandInArithmeticPreIncrementRule' => [2 => ['rules.86']],
		'PHPStan\Rules\Operators\OperandsInArithmeticAdditionRule' => [2 => ['rules.87']],
		'PHPStan\Rules\Operators\OperandsInArithmeticDivisionRule' => [2 => ['rules.88']],
		'PHPStan\Rules\Operators\OperandsInArithmeticExponentiationRule' => [2 => ['rules.89']],
		'PHPStan\Rules\Operators\OperandsInArithmeticModuloRule' => [2 => ['rules.90']],
		'PHPStan\Rules\Operators\OperandsInArithmeticMultiplicationRule' => [2 => ['rules.91']],
		'PHPStan\Rules\Operators\OperandsInArithmeticSubtractionRule' => [2 => ['rules.92']],
		'PHPStan\Rules\Properties\MissingPropertyTypehintRule' => [2 => ['rules.93']],
		'PHPStan\Rules\StrictCalls\DynamicCallOnStaticMethodsRule' => [2 => ['rules.94']],
		'PHPStan\Rules\StrictCalls\StrictFunctionCallsRule' => [2 => ['rules.95']],
		'PHPStan\Rules\SwitchConditions\MatchingTypeInSwitchCaseConditionRule' => [2 => ['rules.96']],
		'PHPStan\Rules\VariableVariables\VariableMethodCallRule' => [2 => ['rules.97']],
		'PHPStan\Rules\VariableVariables\VariableStaticMethodCallRule' => [2 => ['rules.98']],
		'PHPStan\Rules\VariableVariables\VariableStaticPropertyFetchRule' => [2 => ['rules.99']],
		'PHPStan\Rules\VariableVariables\VariableVariablesRule' => [2 => ['rules.100']],
		'PhpParser\BuilderFactory' => [['01']],
		'PhpParser\Lexer' => [['02']],
		'PhpParser\NodeTraverserInterface' => [['03']],
		'PhpParser\NodeTraverser' => [['03']],
		'PhpParser\NodeVisitorAbstract' => [['04']],
		'PhpParser\NodeVisitor' => [['04']],
		'PhpParser\NodeVisitor\NameResolver' => [['04']],
		'PhpParser\ParserAbstract' => [['05']],
		'PhpParser\Parser' => [['05']],
		'PhpParser\Parser\Php7' => [['05']],
		'PhpParser\PrettyPrinterAbstract' => [['06']],
		'PhpParser\PrettyPrinter\Standard' => [['06']],
		'PHPStan\Broker\AnonymousClassNameHelper' => [['07']],
		'PHPStan\PhpDocParser\Lexer\Lexer' => [['08']],
		'PHPStan\PhpDocParser\Parser\TypeParser' => [['09']],
		'PHPStan\PhpDocParser\Parser\ConstExprParser' => [['010']],
		'PHPStan\PhpDocParser\Parser\PhpDocParser' => [['011']],
		'PHPStan\PhpDoc\PhpDocNodeResolver' => [['012']],
		'PHPStan\PhpDoc\PhpDocStringResolver' => [['013']],
		'PHPStan\PhpDoc\TypeNodeResolver' => [['014']],
		'PHPStan\PhpDoc\TypeStringResolver' => [['015']],
		'PHPStan\Analyser\Analyser' => [['016']],
		'PHPStan\Analyser\ScopeFactory' => [['017']],
		'PHPStan\Analyser\NodeScopeResolver' => [['018']],
		'PHPStan\Cache\Cache' => [['019']],
		'PHPStan\Command\AnalyseApplication' => [['020']],
		'PHPStan\Dependency\DependencyDumper' => [['021']],
		'PHPStan\Dependency\DependencyResolver' => [['022']],
		'PHPStan\File\FileHelper' => [['023']],
		'PHPStan\File\FileExcluder' => [['024']],
		'PHPStan\File\FileFinder' => [['025']],
		'PHPStan\Parser\Parser' => [['026'], 2 => [1 => 'directParser']],
		'PHPStan\Parser\CachedParser' => [['026']],
		'PHPStan\Parser\FunctionCallStatementFinder' => [['027']],
		'PHPStan\Reflection\FunctionReflectionFactory' => [['028']],
		'PHPStan\Reflection\MethodsClassReflectionExtension' => [['029', '031']],
		'PHPStan\Reflection\Annotations\AnnotationsMethodsClassReflectionExtension' => [['029']],
		'PHPStan\Reflection\PropertiesClassReflectionExtension' => [['030', '031', '032', '034']],
		'PHPStan\Reflection\Annotations\AnnotationsPropertiesClassReflectionExtension' => [['030']],
		'PHPStan\Reflection\BrokerAwareExtension' => [['031', '034', '072', '0109']],
		'PHPStan\Reflection\Php\PhpClassReflectionExtension' => [['031']],
		'PHPStan\Reflection\PhpDefect\PhpDefectClassReflectionExtension' => [['032']],
		'PHPStan\Reflection\Php\PhpMethodReflectionFactory' => [['033']],
		'PHPStan\Reflection\Php\UniversalObjectCratesClassReflectionExtension' => [['034']],
		'PHPStan\Reflection\SignatureMap\SignatureMapParser' => [['035']],
		'PHPStan\Reflection\SignatureMap\SignatureMapProvider' => [['036']],
		'PHPStan\Rules\ClassCaseSensitivityCheck' => [['037']],
		'PHPStan\Rules\Comparison\ConstantConditionRuleHelper' => [['038']],
		'PHPStan\Rules\Comparison\ImpossibleCheckTypeHelper' => [['039']],
		'PHPStan\Rules\FunctionCallParametersCheck' => [['040']],
		'PHPStan\Rules\FunctionDefinitionCheck' => [['041']],
		'PHPStan\Rules\FunctionReturnTypeCheck' => [['042']],
		'PHPStan\Rules\Properties\PropertyDescriptor' => [['043']],
		'PHPStan\Rules\Properties\PropertyReflectionFinder' => [['044']],
		'PHPStan\Rules\RegistryFactory' => [['045']],
		'PHPStan\Rules\RuleLevelHelper' => [['046']],
		'PHPStan\Rules\UnusedFunctionParametersCheck' => [['047']],
		'PHPStan\Type\FileTypeMapper' => [['048']],
		'PHPStan\Type\DynamicFunctionReturnTypeExtension' => [
			[
				'049',
				'050',
				'051',
				'052',
				'053',
				'055',
				'056',
				'057',
				'058',
				'059',
				'060',
				'061',
				'062',
				'063',
				'064',
				'065',
				'066',
				'068',
				'069',
				'070',
				'071',
				'072',
				'073',
				'074',
				'077',
				'078',
				'079',
				'080',
				'081',
				'082',
				'083',
				'084',
				'085',
				'086',
				'087',
				'088',
				'0108',
				'0109',
				'0110',
			],
		],
		'PHPStan\Type\Php\ArgumentBasedFunctionReturnTypeExtension' => [['049']],
		'PHPStan\Type\Php\ArrayFillFunctionReturnTypeExtension' => [['050']],
		'PHPStan\Type\Php\ArrayFillKeysFunctionReturnTypeExtension' => [['051']],
		'PHPStan\Type\Php\ArrayFilterFunctionReturnTypeReturnTypeExtension' => [['052']],
		'PHPStan\Type\Php\ArrayKeyDynamicReturnTypeExtension' => [['053']],
		'PHPStan\Type\FunctionTypeSpecifyingExtension' => [
			[
				'054',
				'067',
				'075',
				'076',
				'089',
				'090',
				'091',
				'092',
				'093',
				'094',
				'095',
				'096',
				'097',
				'098',
				'099',
				'0100',
				'0101',
				'0102',
				'0103',
				'0104',
				'0105',
				'0106',
				'0107',
			],
		],
		'PHPStan\Analyser\TypeSpecifierAwareExtension' => [
			[
				'054',
				'067',
				'075',
				'076',
				'089',
				'090',
				'091',
				'092',
				'093',
				'094',
				'095',
				'096',
				'097',
				'098',
				'099',
				'0100',
				'0101',
				'0102',
				'0103',
				'0104',
				'0105',
				'0106',
				'0107',
				'0109',
			],
		],
		'PHPStan\Type\Php\ArrayKeyExistsFunctionTypeSpecifyingExtension' => [['054']],
		'PHPStan\Type\Php\ArrayKeyFirstDynamicReturnTypeExtension' => [['055']],
		'PHPStan\Type\Php\ArrayKeyLastDynamicReturnTypeExtension' => [['056']],
		'PHPStan\Type\Php\ArrayKeysFunctionDynamicReturnTypeExtension' => [['057']],
		'PHPStan\Type\Php\ArrayMapFunctionReturnTypeExtension' => [['058']],
		'PHPStan\Type\Php\ArrayMergeFunctionDynamicReturnTypeExtension' => [['059']],
		'PHPStan\Type\Php\ArrayPopFunctionReturnTypeExtension' => [['060']],
		'PHPStan\Type\Php\ArrayReduceFunctionReturnTypeExtension' => [['061']],
		'PHPStan\Type\Php\ArrayShiftFunctionReturnTypeExtension' => [['062']],
		'PHPStan\Type\Php\ArraySliceFunctionReturnTypeExtension' => [['063']],
		'PHPStan\Type\Php\ArraySearchFunctionDynamicReturnTypeExtension' => [['064']],
		'PHPStan\Type\Php\ArrayValuesFunctionDynamicReturnTypeExtension' => [['065']],
		'PHPStan\Type\Php\CountFunctionReturnTypeExtension' => [['066']],
		'PHPStan\Type\Php\CountFunctionTypeSpecifyingExtension' => [['067']],
		'PHPStan\Type\Php\CurlInitReturnTypeExtension' => [['068']],
		'PHPStan\Type\Php\DioStatDynamicFunctionReturnTypeExtension' => [['069']],
		'PHPStan\Type\Php\ExplodeFunctionDynamicReturnTypeExtension' => [['070']],
		'PHPStan\Type\Php\FilterVarDynamicReturnTypeExtension' => [['071']],
		'PHPStan\Type\Php\GetParentClassDynamicFunctionReturnTypeExtension' => [['072']],
		'PHPStan\Type\Php\GettimeofdayDynamicFunctionReturnTypeExtension' => [['073']],
		'PHPStan\Type\DynamicMethodReturnTypeExtension' => [['074']],
		'PHPStan\Type\Php\StatDynamicReturnTypeExtension' => [['074']],
		'PHPStan\Type\Php\MethodExistsTypeSpecifyingExtension' => [['075']],
		'PHPStan\Type\Php\PropertyExistsTypeSpecifyingExtension' => [['076']],
		'PHPStan\Type\Php\MinMaxFunctionReturnTypeExtension' => [['077']],
		'PHPStan\Type\Php\PathinfoFunctionDynamicReturnTypeExtension' => [['078']],
		'PHPStan\Type\Php\ReplaceFunctionsDynamicReturnTypeExtension' => [['079']],
		'PHPStan\Type\Php\ArrayPointerFunctionsDynamicReturnTypeExtension' => [['080']],
		'PHPStan\Type\Php\VarExportFunctionDynamicReturnTypeExtension' => [['081']],
		'PHPStan\Type\Php\MbFunctionsReturnTypeExtension' => [['082']],
		'PHPStan\Type\Php\MicrotimeFunctionReturnTypeExtension' => [['083']],
		'PHPStan\Type\Php\HrtimeFunctionReturnTypeExtension' => [['084']],
		'PHPStan\Type\Php\ParseUrlFunctionDynamicReturnTypeExtension' => [['085']],
		'PHPStan\Type\Php\VersionCompareFunctionDynamicReturnTypeExtension' => [['086']],
		'PHPStan\Type\Php\StrtotimeFunctionReturnTypeExtension' => [['087']],
		'PHPStan\Type\Php\RangeFunctionReturnTypeExtension' => [['088']],
		'PHPStan\Type\Php\AssertFunctionTypeSpecifyingExtension' => [['089']],
		'PHPStan\Type\Php\DefineConstantTypeSpecifyingExtension' => [['090']],
		'PHPStan\Type\Php\DefinedConstantTypeSpecifyingExtension' => [['091']],
		'PHPStan\Type\Php\InArrayFunctionTypeSpecifyingExtension' => [['092']],
		'PHPStan\Type\Php\IsIntFunctionTypeSpecifyingExtension' => [['093']],
		'PHPStan\Type\Php\IsFloatFunctionTypeSpecifyingExtension' => [['094']],
		'PHPStan\Type\Php\IsNullFunctionTypeSpecifyingExtension' => [['095']],
		'PHPStan\Type\Php\IsArrayFunctionTypeSpecifyingExtension' => [['096']],
		'PHPStan\Type\Php\IsBoolFunctionTypeSpecifyingExtension' => [['097']],
		'PHPStan\Type\Php\IsCallableFunctionTypeSpecifyingExtension' => [['098']],
		'PHPStan\Type\Php\IsCountableFunctionTypeSpecifyingExtension' => [['099']],
		'PHPStan\Type\Php\IsResourceFunctionTypeSpecifyingExtension' => [['0100']],
		'PHPStan\Type\Php\IsIterableFunctionTypeSpecifyingExtension' => [['0101']],
		'PHPStan\Type\Php\IsStringFunctionTypeSpecifyingExtension' => [['0102']],
		'PHPStan\Type\Php\IsSubclassOfFunctionTypeSpecifyingExtension' => [['0103']],
		'PHPStan\Type\Php\IsObjectFunctionTypeSpecifyingExtension' => [['0104']],
		'PHPStan\Type\Php\IsNumericFunctionTypeSpecifyingExtension' => [['0105']],
		'PHPStan\Type\Php\IsScalarFunctionTypeSpecifyingExtension' => [['0106']],
		'PHPStan\Type\Php\IsAFunctionTypeSpecifyingExtension' => [['0107']],
		'PHPStan\Type\Php\JsonThrowOnErrorDynamicReturnTypeExtension' => [['0108']],
		'PHPStan\Type\Php\TypeSpecifyingFunctionsDynamicReturnTypeExtension' => [['0109']],
		'PHPStan\Type\Php\StrSplitFunctionReturnTypeExtension' => [['0110']],
		'PHPStan\Analyser\TypeSpecifier' => [['typeSpecifier']],
		'PHPStan\Analyser\TypeSpecifierFactory' => [['typeSpecifierFactory']],
		'PHPStan\File\RelativePathHelper' => [['relativePathHelper']],
		'PHPStan\Broker\Broker' => [['broker']],
		'PHPStan\Broker\BrokerFactory' => [['brokerFactory']],
		'PHPStan\Cache\CacheStorage' => [2 => ['cacheStorage']],
		'PHPStan\Cache\FileCacheStorage' => [2 => ['cacheStorage']],
		'PHPStan\Parser\DirectParser' => [2 => ['directParser']],
		'PHPStan\Rules\Registry' => [['registry']],
		'PHPStan\PhpDoc\TypeNodeResolverFactory' => [['typeNodeResolverFactory']],
		'PHPStan\Command\ErrorFormatter\ErrorFormatter' => [
			[
				'errorFormatter.raw',
				'errorFormatter.table',
				'errorFormatter.checkstyle',
				'errorFormatter.json',
				'errorFormatter.prettyJson',
			],
		],
		'PHPStan\Command\ErrorFormatter\RawErrorFormatter' => [['errorFormatter.raw']],
		'PHPStan\Command\ErrorFormatter\TableErrorFormatter' => [['errorFormatter.table']],
		'PHPStan\Command\ErrorFormatter\CheckstyleErrorFormatter' => [['errorFormatter.checkstyle']],
		'PHPStan\Command\ErrorFormatter\JsonErrorFormatter' => [['errorFormatter.json', 'errorFormatter.prettyJson']],
		'PHPStan\Rules\Classes\ExistingClassInInstanceOfRule' => [['0111']],
		'PHPStan\Rules\Exceptions\CaughtExceptionExistenceRule' => [['0112']],
		'PHPStan\Rules\Functions\CallToNonExistentFunctionRule' => [['0113']],
		'PHPStan\Rules\Methods\CallMethodsRule' => [['0114']],
		'PHPStan\Rules\Methods\CallStaticMethodsRule' => [['0115']],
		'PHPStan\Rules\Missing\MissingReturnRule' => [['0116']],
		'PHPStan\Rules\Namespaces\ExistingNamesInGroupUseRule' => [['0117']],
		'PHPStan\Rules\Namespaces\ExistingNamesInUseRule' => [['0118']],
		'PHPStan\Rules\Operators\InvalidIncDecOperationRule' => [['0119']],
		'PHPStan\Rules\Properties\AccessPropertiesRule' => [['0120']],
		'PHPStan\Rules\Properties\AccessStaticPropertiesRule' => [['0121']],
		'PHPStan\Rules\Properties\ExistingClassesInPropertiesRule' => [['0122']],
		'PHPStan\Rules\Properties\WritingToReadOnlyPropertiesRule' => [['0123']],
		'PHPStan\Rules\Properties\ReadingWriteOnlyPropertiesRule' => [['0124']],
		'PHPStan\Rules\Variables\DefinedVariableRule' => [['0125']],
		'PHPStan\Rules\Variables\DefinedVariableInAnonymousFunctionUseRule' => [['0126']],
		'PHPStan\Rules\Regexp\RegularExpressionPatternRule' => [['0127']],
		'PHPStan\Rules\Functions\CallCallablesRule' => [['0128']],
		'PHPStan\Rules\Arrays\AppendedArrayKeyTypeRule' => [['0129']],
		'PHPStan\Rules\Arrays\InvalidKeyInArrayDimFetchRule' => [['0130']],
		'PHPStan\Rules\Arrays\InvalidKeyInArrayItemRule' => [['0131']],
		'PHPStan\Rules\Arrays\NonexistentOffsetInArrayDimFetchRule' => [['0132']],
		'PHPStan\Rules\Generators\YieldFromTypeRule' => [['0133']],
		'PHPStan\Rules\Generators\YieldInGeneratorRule' => [['0134']],
		'PHPStan\Rules\Generators\YieldTypeRule' => [['0135']],
		'PHPStan\Rules\Methods\MethodSignatureRule' => [['0136']],
		'PHPStan\Rules\Classes\ImpossibleInstanceOfRule' => [['0137']],
		'PHPStan\Rules\Comparison\ImpossibleCheckTypeFunctionCallRule' => [['0138']],
		'PHPStan\Rules\Comparison\ImpossibleCheckTypeMethodCallRule' => [['0139']],
		'PHPStan\Rules\Comparison\ImpossibleCheckTypeStaticMethodCallRule' => [['0140']],
		'PHPStan\Rules\Comparison\StrictComparisonOfDifferentTypesRule' => [['0141']],
		'PHPStan\Rules\Exceptions\DeadCatchRule' => [['0142']],
		'PHPStan\Rules\DeadCode\NoopRule' => [['0143']],
		'PHPStan\Rules\DeadCode\UnreachableStatementRule' => [['0144']],
		'PHPStan\Rules\BooleansInConditions\BooleanRuleHelper' => [['0145']],
		'PHPStan\Rules\Operators\OperatorRuleHelper' => [['0146']],
		'PHPStan\Rules\VariableVariables\VariablePropertyFetchRule' => [['0147']],
	];


	public function __construct(array $params = [])
	{
		parent::__construct($params);
		$this->parameters += [
			'bootstrap' => null,
			'excludes_analyse' => [],
			'autoload_directories' => [],
			'autoload_files' => [],
			'fileExtensions' => ['php'],
			'checkAlwaysTrueCheckTypeFunctionCall' => true,
			'checkAlwaysTrueInstanceof' => true,
			'checkAlwaysTrueStrictComparison' => true,
			'checkClassCaseSensitivity' => true,
			'checkFunctionArgumentTypes' => true,
			'checkFunctionNameCase' => true,
			'checkArgumentsPassedByReference' => true,
			'checkMaybeUndefinedVariables' => true,
			'checkNullables' => true,
			'checkThisOnly' => false,
			'checkUnionTypes' => true,
			'checkExplicitMixedMissingReturn' => false,
			'checkPhpDocMissingReturn' => true,
			'reportMaybes' => true,
			'reportMaybesInMethodSignatures' => true,
			'reportStaticMethodSignatures' => true,
			'polluteScopeWithLoopInitialAssignments' => false,
			'polluteScopeWithAlwaysIterableForeach' => false,
			'polluteCatchScopeWithTryAssignments' => false,
			'reportMagicMethods' => true,
			'reportMagicProperties' => true,
			'ignoreErrors' => [
				'#Call to an undefined method Symfony\\\Component\\\Config\\\Definition\\\Builder\\\NodeDefinition::children\(\)#',
			],
			'internalErrorsCountLimit' => 50,
			'cache' => ['nodesByFileCountMax' => 512, 'nodesByStringCountMax' => 512],
			'reportUnmatchedIgnoredErrors' => true,
			'scopeClass' => 'PHPStan\Analyser\Scope',
			'universalObjectCratesClasses' => ['stdClass', 'SimpleXMLElement'],
			'earlyTerminatingMethodCalls' => [],
			'memoryLimitFile' => '/Users/mr_evrey/Sites/blog-gk/webmag-blog/.build/phpstan/.memory_limit',
			'benchmarkFile' => null,
			'dynamicConstantNames' => [
				'ICONV_IMPL',
				'PHP_VERSION',
				'PHP_MAJOR_VERSION',
				'PHP_MINOR_VERSION',
				'PHP_RELEASE_VERSION',
				'PHP_VERSION_ID',
				'PHP_EXTRA_VERSION',
				'PHP_ZTS',
				'PHP_DEBUG',
				'PHP_MAXPATHLEN',
				'PHP_OS',
				'PHP_OS_FAMILY',
				'PHP_SAPI',
				'PHP_EOL',
				'PHP_INT_MAX',
				'PHP_INT_MIN',
				'PHP_INT_SIZE',
				'PHP_FLOAT_DIG',
				'PHP_FLOAT_EPSILON',
				'PHP_FLOAT_MIN',
				'PHP_FLOAT_MAX',
				'DEFAULT_INCLUDE_PATH',
				'PEAR_INSTALL_DIR',
				'PEAR_EXTENSION_DIR',
				'PHP_EXTENSION_DIR',
				'PHP_PREFIX',
				'PHP_BINDIR',
				'PHP_BINARY',
				'PHP_MANDIR',
				'PHP_LIBDIR',
				'PHP_DATADIR',
				'PHP_SYSCONFDIR',
				'PHP_LOCALSTATEDIR',
				'PHP_CONFIG_FILE_PATH',
				'PHP_CONFIG_FILE_SCAN_DIR',
				'PHP_SHLIB_SUFFIX',
				'PHP_FD_SETSIZE',
			],
			'customRulesetUsed' => false,
			'featureToggles' => [
				'missingReturnRule' => false,
				'yieldRules' => false,
				'deadCatchesRule' => false,
				'noopRule' => false,
				'unreachableStatement' => false,
			],
			'paths' => ['src'],
			'tmpDir' => '/Users/mr_evrey/Sites/blog-gk/webmag-blog/.build/phpstan',
			'appDir' => '/Users/mr_evrey/Sites/blog-gk/webmag-blog/vendor/phpstan/phpstan/src/DependencyInjection',
			'wwwDir' => '/Users/mr_evrey/Sites/blog-gk/webmag-blog/vendor/phpstan/phpstan/bin',
			'vendorDir' => '/Users/mr_evrey/Sites/blog-gk/webmag-blog/vendor',
			'debugMode' => true,
			'productionMode' => false,
			'consoleMode' => true,
			'tempDir' => '/Users/mr_evrey/Sites/blog-gk/webmag-blog/.build/phpstan',
			'rootDir' => '/Users/mr_evrey/Sites/blog-gk/webmag-blog/vendor/phpstan/phpstan',
			'currentWorkingDirectory' => '/Users/mr_evrey/Sites/blog-gk/webmag-blog',
			'cliArgumentsVariablesRegistered' => true,
		];
	}


	public function createService01(): PhpParser\BuilderFactory
	{
		$service = new PhpParser\BuilderFactory;
		return $service;
	}


	public function createService02(): PhpParser\Lexer
	{
		$service = new PhpParser\Lexer;
		return $service;
	}


	public function createService03(): PhpParser\NodeTraverser
	{
		$service = new PhpParser\NodeTraverser;
		$service->addVisitor($this->getService('04'));
		return $service;
	}


	public function createService04(): PhpParser\NodeVisitor\NameResolver
	{
		$service = new PhpParser\NodeVisitor\NameResolver;
		return $service;
	}


	public function createService05(): PhpParser\Parser\Php7
	{
		$service = new PhpParser\Parser\Php7($this->getService('02'));
		return $service;
	}


	public function createService06(): PhpParser\PrettyPrinter\Standard
	{
		$service = new PhpParser\PrettyPrinter\Standard;
		return $service;
	}


	public function createService07(): PHPStan\Broker\AnonymousClassNameHelper
	{
		$service = new PHPStan\Broker\AnonymousClassNameHelper($this->getService('023'), $this->getService('relativePathHelper'));
		return $service;
	}


	public function createService08(): PHPStan\PhpDocParser\Lexer\Lexer
	{
		$service = new PHPStan\PhpDocParser\Lexer\Lexer;
		return $service;
	}


	public function createService09(): PHPStan\PhpDocParser\Parser\TypeParser
	{
		$service = new PHPStan\PhpDocParser\Parser\TypeParser;
		return $service;
	}


	public function createService010(): PHPStan\PhpDocParser\Parser\ConstExprParser
	{
		$service = new PHPStan\PhpDocParser\Parser\ConstExprParser;
		return $service;
	}


	public function createService011(): PHPStan\PhpDocParser\Parser\PhpDocParser
	{
		$service = new PHPStan\PhpDocParser\Parser\PhpDocParser($this->getService('09'), $this->getService('010'));
		return $service;
	}


	public function createService012(): PHPStan\PhpDoc\PhpDocNodeResolver
	{
		$service = new PHPStan\PhpDoc\PhpDocNodeResolver($this->getService('014'));
		return $service;
	}


	public function createService013(): PHPStan\PhpDoc\PhpDocStringResolver
	{
		$service = new PHPStan\PhpDoc\PhpDocStringResolver($this->getService('08'), $this->getService('011'), $this->getService('012'));
		return $service;
	}


	public function createService014(): PHPStan\PhpDoc\TypeNodeResolver
	{
		$service = $this->getService('typeNodeResolverFactory')->create();
		return $service;
	}


	public function createService015(): PHPStan\PhpDoc\TypeStringResolver
	{
		$service = new PHPStan\PhpDoc\TypeStringResolver($this->getService('08'), $this->getService('09'), $this->getService('014'));
		return $service;
	}


	public function createService016(): PHPStan\Analyser\Analyser
	{
		$service = new PHPStan\Analyser\Analyser(
			$this->getService('017'),
			$this->getService('026'),
			$this->getService('registry'),
			$this->getService('018'),
			$this->getService('023'),
			[
				'#Call to an undefined method Symfony\\\Component\\\Config\\\Definition\\\Builder\\\NodeDefinition::children\(\)#',
			],
			true,
			50,
			null
		);
		return $service;
	}


	public function createService017(): PHPStan\Analyser\ScopeFactory
	{
		$service = new PHPStan\Analyser\ScopeFactory(
			'PHPStan\Analyser\Scope',
			$this->getService('broker'),
			$this->getService('06'),
			$this->getService('typeSpecifier'),
			$this
		);
		return $service;
	}


	public function createService018(): PHPStan\Analyser\NodeScopeResolver
	{
		$service = new PHPStan\Analyser\NodeScopeResolver(
			$this->getService('broker'),
			$this->getService('026'),
			$this->getService('048'),
			$this->getService('023'),
			$this->getService('typeSpecifier'),
			false,
			false,
			false,
			[]
		);
		return $service;
	}


	public function createService019(): PHPStan\Cache\Cache
	{
		$service = new PHPStan\Cache\Cache($this->getService('cacheStorage'));
		return $service;
	}


	public function createService020(): PHPStan\Command\AnalyseApplication
	{
		$service = new PHPStan\Command\AnalyseApplication(
			$this->getService('016'),
			'/Users/mr_evrey/Sites/blog-gk/webmag-blog/.build/phpstan/.memory_limit',
			$this->getService('023'),
			'/Users/mr_evrey/Sites/blog-gk/webmag-blog'
		);
		return $service;
	}


	public function createService021(): PHPStan\Dependency\DependencyDumper
	{
		$service = new PHPStan\Dependency\DependencyDumper(
			$this->getService('022'),
			$this->getService('018'),
			$this->getService('023'),
			$this->getService('026'),
			$this->getService('017'),
			$this->getService('025')
		);
		return $service;
	}


	public function createService022(): PHPStan\Dependency\DependencyResolver
	{
		$service = new PHPStan\Dependency\DependencyResolver($this->getService('broker'));
		return $service;
	}


	public function createService023(): PHPStan\File\FileHelper
	{
		$service = new PHPStan\File\FileHelper('/Users/mr_evrey/Sites/blog-gk/webmag-blog');
		return $service;
	}


	public function createService024(): PHPStan\File\FileExcluder
	{
		$service = new PHPStan\File\FileExcluder($this->getService('023'), []);
		return $service;
	}


	public function createService025(): PHPStan\File\FileFinder
	{
		$service = new PHPStan\File\FileFinder($this->getService('024'), $this->getService('023'), ['php']);
		return $service;
	}


	public function createService026(): PHPStan\Parser\CachedParser
	{
		$service = new PHPStan\Parser\CachedParser($this->getService('directParser'), 512, 512);
		return $service;
	}


	public function createService027(): PHPStan\Parser\FunctionCallStatementFinder
	{
		$service = new PHPStan\Parser\FunctionCallStatementFinder;
		return $service;
	}


	public function createService028(): PHPStan\Reflection\FunctionReflectionFactory
	{
		return new class ($this) implements PHPStan\Reflection\FunctionReflectionFactory {
			private $container;


			public function __construct(Container_e3e858657a $container)
			{
				$this->container = $container;
			}


			public function create(
				ReflectionFunction $reflection,
				array $phpDocParameterTypes,
				?PHPStan\Type\Type $phpDocReturnType,
				?PHPStan\Type\Type $phpDocThrowType,
				bool $isDeprecated,
				bool $isInternal,
				bool $isFinal,
				$filename
			): PHPStan\Reflection\Php\PhpFunctionReflection {
				$service = new PHPStan\Reflection\Php\PhpFunctionReflection(
					$reflection,
					$this->container->getService('026'),
					$this->container->getService('027'),
					$this->container->getService('019'),
					$phpDocParameterTypes,
					$phpDocReturnType,
					$phpDocThrowType,
					$isDeprecated,
					$isInternal,
					$isFinal,
					$filename
				);
				return $service;
			}
		};
	}


	public function createService029(): PHPStan\Reflection\Annotations\AnnotationsMethodsClassReflectionExtension
	{
		$service = new PHPStan\Reflection\Annotations\AnnotationsMethodsClassReflectionExtension($this->getService('048'));
		return $service;
	}


	public function createService030(): PHPStan\Reflection\Annotations\AnnotationsPropertiesClassReflectionExtension
	{
		$service = new PHPStan\Reflection\Annotations\AnnotationsPropertiesClassReflectionExtension($this->getService('048'));
		return $service;
	}


	public function createService031(): PHPStan\Reflection\Php\PhpClassReflectionExtension
	{
		$service = new PHPStan\Reflection\Php\PhpClassReflectionExtension(
			$this->getService('033'),
			$this->getService('048'),
			$this->getService('029'),
			$this->getService('030'),
			$this->getService('036')
		);
		return $service;
	}


	public function createService032(): PHPStan\Reflection\PhpDefect\PhpDefectClassReflectionExtension
	{
		$service = new PHPStan\Reflection\PhpDefect\PhpDefectClassReflectionExtension($this->getService('015'), $this->getService('030'));
		return $service;
	}


	public function createService033(): PHPStan\Reflection\Php\PhpMethodReflectionFactory
	{
		return new class ($this) implements PHPStan\Reflection\Php\PhpMethodReflectionFactory {
			private $container;


			public function __construct(Container_e3e858657a $container)
			{
				$this->container = $container;
			}


			public function create(
				PHPStan\Reflection\ClassReflection $declaringClass,
				?PHPStan\Reflection\ClassReflection $declaringTrait,
				PHPStan\Reflection\Php\BuiltinMethodReflection $reflection,
				array $phpDocParameterTypes,
				?PHPStan\Type\Type $phpDocReturnType,
				?PHPStan\Type\Type $phpDocThrowType,
				bool $isDeprecated,
				bool $isInternal,
				bool $isFinal
			): PHPStan\Reflection\Php\PhpMethodReflection {
				$service = new PHPStan\Reflection\Php\PhpMethodReflection(
					$declaringClass,
					$declaringTrait,
					$reflection,
					$this->container->getService('broker'),
					$this->container->getService('026'),
					$this->container->getService('027'),
					$this->container->getService('019'),
					$phpDocParameterTypes,
					$phpDocReturnType,
					$phpDocThrowType,
					$isDeprecated,
					$isInternal,
					$isFinal
				);
				return $service;
			}
		};
	}


	public function createService034(): PHPStan\Reflection\Php\UniversalObjectCratesClassReflectionExtension
	{
		$service = new PHPStan\Reflection\Php\UniversalObjectCratesClassReflectionExtension(['stdClass', 'SimpleXMLElement']);
		return $service;
	}


	public function createService035(): PHPStan\Reflection\SignatureMap\SignatureMapParser
	{
		$service = new PHPStan\Reflection\SignatureMap\SignatureMapParser($this->getService('015'));
		return $service;
	}


	public function createService036(): PHPStan\Reflection\SignatureMap\SignatureMapProvider
	{
		$service = new PHPStan\Reflection\SignatureMap\SignatureMapProvider($this->getService('035'));
		return $service;
	}


	public function createService037(): PHPStan\Rules\ClassCaseSensitivityCheck
	{
		$service = new PHPStan\Rules\ClassCaseSensitivityCheck($this->getService('broker'));
		return $service;
	}


	public function createService038(): PHPStan\Rules\Comparison\ConstantConditionRuleHelper
	{
		$service = new PHPStan\Rules\Comparison\ConstantConditionRuleHelper($this->getService('039'));
		return $service;
	}


	public function createService039(): PHPStan\Rules\Comparison\ImpossibleCheckTypeHelper
	{
		$service = new PHPStan\Rules\Comparison\ImpossibleCheckTypeHelper($this->getService('broker'), $this->getService('typeSpecifier'));
		return $service;
	}


	public function createService040(): PHPStan\Rules\FunctionCallParametersCheck
	{
		$service = new PHPStan\Rules\FunctionCallParametersCheck($this->getService('046'), true, true);
		return $service;
	}


	public function createService041(): PHPStan\Rules\FunctionDefinitionCheck
	{
		$service = new PHPStan\Rules\FunctionDefinitionCheck($this->getService('broker'), $this->getService('037'), true, false);
		return $service;
	}


	public function createService042(): PHPStan\Rules\FunctionReturnTypeCheck
	{
		$service = new PHPStan\Rules\FunctionReturnTypeCheck($this->getService('046'));
		return $service;
	}


	public function createService043(): PHPStan\Rules\Properties\PropertyDescriptor
	{
		$service = new PHPStan\Rules\Properties\PropertyDescriptor;
		return $service;
	}


	public function createService044(): PHPStan\Rules\Properties\PropertyReflectionFinder
	{
		$service = new PHPStan\Rules\Properties\PropertyReflectionFinder;
		return $service;
	}


	public function createService045(): PHPStan\Rules\RegistryFactory
	{
		$service = new PHPStan\Rules\RegistryFactory($this);
		return $service;
	}


	public function createService046(): PHPStan\Rules\RuleLevelHelper
	{
		$service = new PHPStan\Rules\RuleLevelHelper($this->getService('broker'), true, false, true);
		return $service;
	}


	public function createService047(): PHPStan\Rules\UnusedFunctionParametersCheck
	{
		$service = new PHPStan\Rules\UnusedFunctionParametersCheck;
		return $service;
	}


	public function createService048(): PHPStan\Type\FileTypeMapper
	{
		$service = new PHPStan\Type\FileTypeMapper(
			$this->getService('026'),
			$this->getService('013'),
			$this->getService('019'),
			$this->getService('07'),
			$this->getService('014')
		);
		return $service;
	}


	public function createService049(): PHPStan\Type\Php\ArgumentBasedFunctionReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\ArgumentBasedFunctionReturnTypeExtension;
		return $service;
	}


	public function createService050(): PHPStan\Type\Php\ArrayFillFunctionReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\ArrayFillFunctionReturnTypeExtension;
		return $service;
	}


	public function createService051(): PHPStan\Type\Php\ArrayFillKeysFunctionReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\ArrayFillKeysFunctionReturnTypeExtension;
		return $service;
	}


	public function createService052(): PHPStan\Type\Php\ArrayFilterFunctionReturnTypeReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\ArrayFilterFunctionReturnTypeReturnTypeExtension;
		return $service;
	}


	public function createService053(): PHPStan\Type\Php\ArrayKeyDynamicReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\ArrayKeyDynamicReturnTypeExtension;
		return $service;
	}


	public function createService054(): PHPStan\Type\Php\ArrayKeyExistsFunctionTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\ArrayKeyExistsFunctionTypeSpecifyingExtension;
		return $service;
	}


	public function createService055(): PHPStan\Type\Php\ArrayKeyFirstDynamicReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\ArrayKeyFirstDynamicReturnTypeExtension;
		return $service;
	}


	public function createService056(): PHPStan\Type\Php\ArrayKeyLastDynamicReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\ArrayKeyLastDynamicReturnTypeExtension;
		return $service;
	}


	public function createService057(): PHPStan\Type\Php\ArrayKeysFunctionDynamicReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\ArrayKeysFunctionDynamicReturnTypeExtension;
		return $service;
	}


	public function createService058(): PHPStan\Type\Php\ArrayMapFunctionReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\ArrayMapFunctionReturnTypeExtension;
		return $service;
	}


	public function createService059(): PHPStan\Type\Php\ArrayMergeFunctionDynamicReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\ArrayMergeFunctionDynamicReturnTypeExtension;
		return $service;
	}


	public function createService060(): PHPStan\Type\Php\ArrayPopFunctionReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\ArrayPopFunctionReturnTypeExtension;
		return $service;
	}


	public function createService061(): PHPStan\Type\Php\ArrayReduceFunctionReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\ArrayReduceFunctionReturnTypeExtension;
		return $service;
	}


	public function createService062(): PHPStan\Type\Php\ArrayShiftFunctionReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\ArrayShiftFunctionReturnTypeExtension;
		return $service;
	}


	public function createService063(): PHPStan\Type\Php\ArraySliceFunctionReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\ArraySliceFunctionReturnTypeExtension;
		return $service;
	}


	public function createService064(): PHPStan\Type\Php\ArraySearchFunctionDynamicReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\ArraySearchFunctionDynamicReturnTypeExtension;
		return $service;
	}


	public function createService065(): PHPStan\Type\Php\ArrayValuesFunctionDynamicReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\ArrayValuesFunctionDynamicReturnTypeExtension;
		return $service;
	}


	public function createService066(): PHPStan\Type\Php\CountFunctionReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\CountFunctionReturnTypeExtension;
		return $service;
	}


	public function createService067(): PHPStan\Type\Php\CountFunctionTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\CountFunctionTypeSpecifyingExtension;
		return $service;
	}


	public function createService068(): PHPStan\Type\Php\CurlInitReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\CurlInitReturnTypeExtension;
		return $service;
	}


	public function createService069(): PHPStan\Type\Php\DioStatDynamicFunctionReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\DioStatDynamicFunctionReturnTypeExtension;
		return $service;
	}


	public function createService070(): PHPStan\Type\Php\ExplodeFunctionDynamicReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\ExplodeFunctionDynamicReturnTypeExtension;
		return $service;
	}


	public function createService071(): PHPStan\Type\Php\FilterVarDynamicReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\FilterVarDynamicReturnTypeExtension;
		return $service;
	}


	public function createService072(): PHPStan\Type\Php\GetParentClassDynamicFunctionReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\GetParentClassDynamicFunctionReturnTypeExtension;
		return $service;
	}


	public function createService073(): PHPStan\Type\Php\GettimeofdayDynamicFunctionReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\GettimeofdayDynamicFunctionReturnTypeExtension;
		return $service;
	}


	public function createService074(): PHPStan\Type\Php\StatDynamicReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\StatDynamicReturnTypeExtension;
		return $service;
	}


	public function createService075(): PHPStan\Type\Php\MethodExistsTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\MethodExistsTypeSpecifyingExtension;
		return $service;
	}


	public function createService076(): PHPStan\Type\Php\PropertyExistsTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\PropertyExistsTypeSpecifyingExtension;
		return $service;
	}


	public function createService077(): PHPStan\Type\Php\MinMaxFunctionReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\MinMaxFunctionReturnTypeExtension;
		return $service;
	}


	public function createService078(): PHPStan\Type\Php\PathinfoFunctionDynamicReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\PathinfoFunctionDynamicReturnTypeExtension;
		return $service;
	}


	public function createService079(): PHPStan\Type\Php\ReplaceFunctionsDynamicReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\ReplaceFunctionsDynamicReturnTypeExtension;
		return $service;
	}


	public function createService080(): PHPStan\Type\Php\ArrayPointerFunctionsDynamicReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\ArrayPointerFunctionsDynamicReturnTypeExtension;
		return $service;
	}


	public function createService081(): PHPStan\Type\Php\VarExportFunctionDynamicReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\VarExportFunctionDynamicReturnTypeExtension;
		return $service;
	}


	public function createService082(): PHPStan\Type\Php\MbFunctionsReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\MbFunctionsReturnTypeExtension;
		return $service;
	}


	public function createService083(): PHPStan\Type\Php\MicrotimeFunctionReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\MicrotimeFunctionReturnTypeExtension;
		return $service;
	}


	public function createService084(): PHPStan\Type\Php\HrtimeFunctionReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\HrtimeFunctionReturnTypeExtension;
		return $service;
	}


	public function createService085(): PHPStan\Type\Php\ParseUrlFunctionDynamicReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\ParseUrlFunctionDynamicReturnTypeExtension;
		return $service;
	}


	public function createService086(): PHPStan\Type\Php\VersionCompareFunctionDynamicReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\VersionCompareFunctionDynamicReturnTypeExtension;
		return $service;
	}


	public function createService087(): PHPStan\Type\Php\StrtotimeFunctionReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\StrtotimeFunctionReturnTypeExtension;
		return $service;
	}


	public function createService088(): PHPStan\Type\Php\RangeFunctionReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\RangeFunctionReturnTypeExtension;
		return $service;
	}


	public function createService089(): PHPStan\Type\Php\AssertFunctionTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\AssertFunctionTypeSpecifyingExtension;
		return $service;
	}


	public function createService090(): PHPStan\Type\Php\DefineConstantTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\DefineConstantTypeSpecifyingExtension;
		return $service;
	}


	public function createService091(): PHPStan\Type\Php\DefinedConstantTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\DefinedConstantTypeSpecifyingExtension;
		return $service;
	}


	public function createService092(): PHPStan\Type\Php\InArrayFunctionTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\InArrayFunctionTypeSpecifyingExtension;
		return $service;
	}


	public function createService093(): PHPStan\Type\Php\IsIntFunctionTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\IsIntFunctionTypeSpecifyingExtension;
		return $service;
	}


	public function createService094(): PHPStan\Type\Php\IsFloatFunctionTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\IsFloatFunctionTypeSpecifyingExtension;
		return $service;
	}


	public function createService095(): PHPStan\Type\Php\IsNullFunctionTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\IsNullFunctionTypeSpecifyingExtension;
		return $service;
	}


	public function createService096(): PHPStan\Type\Php\IsArrayFunctionTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\IsArrayFunctionTypeSpecifyingExtension;
		return $service;
	}


	public function createService097(): PHPStan\Type\Php\IsBoolFunctionTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\IsBoolFunctionTypeSpecifyingExtension;
		return $service;
	}


	public function createService098(): PHPStan\Type\Php\IsCallableFunctionTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\IsCallableFunctionTypeSpecifyingExtension;
		return $service;
	}


	public function createService099(): PHPStan\Type\Php\IsCountableFunctionTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\IsCountableFunctionTypeSpecifyingExtension;
		return $service;
	}


	public function createService0100(): PHPStan\Type\Php\IsResourceFunctionTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\IsResourceFunctionTypeSpecifyingExtension;
		return $service;
	}


	public function createService0101(): PHPStan\Type\Php\IsIterableFunctionTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\IsIterableFunctionTypeSpecifyingExtension;
		return $service;
	}


	public function createService0102(): PHPStan\Type\Php\IsStringFunctionTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\IsStringFunctionTypeSpecifyingExtension;
		return $service;
	}


	public function createService0103(): PHPStan\Type\Php\IsSubclassOfFunctionTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\IsSubclassOfFunctionTypeSpecifyingExtension;
		return $service;
	}


	public function createService0104(): PHPStan\Type\Php\IsObjectFunctionTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\IsObjectFunctionTypeSpecifyingExtension;
		return $service;
	}


	public function createService0105(): PHPStan\Type\Php\IsNumericFunctionTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\IsNumericFunctionTypeSpecifyingExtension;
		return $service;
	}


	public function createService0106(): PHPStan\Type\Php\IsScalarFunctionTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\IsScalarFunctionTypeSpecifyingExtension;
		return $service;
	}


	public function createService0107(): PHPStan\Type\Php\IsAFunctionTypeSpecifyingExtension
	{
		$service = new PHPStan\Type\Php\IsAFunctionTypeSpecifyingExtension;
		return $service;
	}


	public function createService0108(): PHPStan\Type\Php\JsonThrowOnErrorDynamicReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\JsonThrowOnErrorDynamicReturnTypeExtension;
		return $service;
	}


	public function createService0109(): PHPStan\Type\Php\TypeSpecifyingFunctionsDynamicReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\TypeSpecifyingFunctionsDynamicReturnTypeExtension;
		return $service;
	}


	public function createService0110(): PHPStan\Type\Php\StrSplitFunctionReturnTypeExtension
	{
		$service = new PHPStan\Type\Php\StrSplitFunctionReturnTypeExtension;
		return $service;
	}


	public function createService0111(): PHPStan\Rules\Classes\ExistingClassInInstanceOfRule
	{
		$service = new PHPStan\Rules\Classes\ExistingClassInInstanceOfRule($this->getService('broker'), $this->getService('037'), true);
		return $service;
	}


	public function createService0112(): PHPStan\Rules\Exceptions\CaughtExceptionExistenceRule
	{
		$service = new PHPStan\Rules\Exceptions\CaughtExceptionExistenceRule($this->getService('broker'), $this->getService('037'), true);
		return $service;
	}


	public function createService0113(): PHPStan\Rules\Functions\CallToNonExistentFunctionRule
	{
		$service = new PHPStan\Rules\Functions\CallToNonExistentFunctionRule($this->getService('broker'), true);
		return $service;
	}


	public function createService0114(): PHPStan\Rules\Methods\CallMethodsRule
	{
		$service = new PHPStan\Rules\Methods\CallMethodsRule($this->getService('broker'), $this->getService('040'), $this->getService('046'), true, true);
		return $service;
	}


	public function createService0115(): PHPStan\Rules\Methods\CallStaticMethodsRule
	{
		$service = new PHPStan\Rules\Methods\CallStaticMethodsRule(
			$this->getService('broker'),
			$this->getService('040'),
			$this->getService('046'),
			$this->getService('037'),
			true,
			true
		);
		return $service;
	}


	public function createService0116(): PHPStan\Rules\Missing\MissingReturnRule
	{
		$service = new PHPStan\Rules\Missing\MissingReturnRule(false, true);
		return $service;
	}


	public function createService0117(): PHPStan\Rules\Namespaces\ExistingNamesInGroupUseRule
	{
		$service = new PHPStan\Rules\Namespaces\ExistingNamesInGroupUseRule($this->getService('broker'), $this->getService('037'), true);
		return $service;
	}


	public function createService0118(): PHPStan\Rules\Namespaces\ExistingNamesInUseRule
	{
		$service = new PHPStan\Rules\Namespaces\ExistingNamesInUseRule($this->getService('broker'), $this->getService('037'), true);
		return $service;
	}


	public function createService0119(): PHPStan\Rules\Operators\InvalidIncDecOperationRule
	{
		$service = new PHPStan\Rules\Operators\InvalidIncDecOperationRule(false);
		return $service;
	}


	public function createService0120(): PHPStan\Rules\Properties\AccessPropertiesRule
	{
		$service = new PHPStan\Rules\Properties\AccessPropertiesRule($this->getService('broker'), $this->getService('046'), true);
		return $service;
	}


	public function createService0121(): PHPStan\Rules\Properties\AccessStaticPropertiesRule
	{
		$service = new PHPStan\Rules\Properties\AccessStaticPropertiesRule($this->getService('broker'), $this->getService('046'), $this->getService('037'));
		return $service;
	}


	public function createService0122(): PHPStan\Rules\Properties\ExistingClassesInPropertiesRule
	{
		$service = new PHPStan\Rules\Properties\ExistingClassesInPropertiesRule($this->getService('broker'), $this->getService('037'), true);
		return $service;
	}


	public function createService0123(): PHPStan\Rules\Properties\WritingToReadOnlyPropertiesRule
	{
		$service = new PHPStan\Rules\Properties\WritingToReadOnlyPropertiesRule($this->getService('046'), $this->getService('043'), $this->getService('044'), false);
		return $service;
	}


	public function createService0124(): PHPStan\Rules\Properties\ReadingWriteOnlyPropertiesRule
	{
		$service = new PHPStan\Rules\Properties\ReadingWriteOnlyPropertiesRule($this->getService('043'), $this->getService('044'), $this->getService('046'), false);
		return $service;
	}


	public function createService0125(): PHPStan\Rules\Variables\DefinedVariableRule
	{
		$service = new PHPStan\Rules\Variables\DefinedVariableRule(true, true);
		return $service;
	}


	public function createService0126(): PHPStan\Rules\Variables\DefinedVariableInAnonymousFunctionUseRule
	{
		$service = new PHPStan\Rules\Variables\DefinedVariableInAnonymousFunctionUseRule(true);
		return $service;
	}


	public function createService0127(): PHPStan\Rules\Regexp\RegularExpressionPatternRule
	{
		$service = new PHPStan\Rules\Regexp\RegularExpressionPatternRule;
		return $service;
	}


	public function createService0128(): PHPStan\Rules\Functions\CallCallablesRule
	{
		$service = new PHPStan\Rules\Functions\CallCallablesRule($this->getService('040'), $this->getService('046'), true);
		return $service;
	}


	public function createService0129(): PHPStan\Rules\Arrays\AppendedArrayKeyTypeRule
	{
		$service = new PHPStan\Rules\Arrays\AppendedArrayKeyTypeRule($this->getService('044'), true);
		return $service;
	}


	public function createService0130(): PHPStan\Rules\Arrays\InvalidKeyInArrayDimFetchRule
	{
		$service = new PHPStan\Rules\Arrays\InvalidKeyInArrayDimFetchRule(true);
		return $service;
	}


	public function createService0131(): PHPStan\Rules\Arrays\InvalidKeyInArrayItemRule
	{
		$service = new PHPStan\Rules\Arrays\InvalidKeyInArrayItemRule(true);
		return $service;
	}


	public function createService0132(): PHPStan\Rules\Arrays\NonexistentOffsetInArrayDimFetchRule
	{
		$service = new PHPStan\Rules\Arrays\NonexistentOffsetInArrayDimFetchRule($this->getService('046'), true);
		return $service;
	}


	public function createService0133(): PHPStan\Rules\Generators\YieldFromTypeRule
	{
		$service = new PHPStan\Rules\Generators\YieldFromTypeRule($this->getService('046'), true);
		return $service;
	}


	public function createService0134(): PHPStan\Rules\Generators\YieldInGeneratorRule
	{
		$service = new PHPStan\Rules\Generators\YieldInGeneratorRule(true);
		return $service;
	}


	public function createService0135(): PHPStan\Rules\Generators\YieldTypeRule
	{
		$service = new PHPStan\Rules\Generators\YieldTypeRule($this->getService('046'));
		return $service;
	}


	public function createService0136(): PHPStan\Rules\Methods\MethodSignatureRule
	{
		$service = new PHPStan\Rules\Methods\MethodSignatureRule(true, true);
		return $service;
	}


	public function createService0137(): PHPStan\Rules\Classes\ImpossibleInstanceOfRule
	{
		$service = new PHPStan\Rules\Classes\ImpossibleInstanceOfRule(true);
		return $service;
	}


	public function createService0138(): PHPStan\Rules\Comparison\ImpossibleCheckTypeFunctionCallRule
	{
		$service = new PHPStan\Rules\Comparison\ImpossibleCheckTypeFunctionCallRule($this->getService('039'), true);
		return $service;
	}


	public function createService0139(): PHPStan\Rules\Comparison\ImpossibleCheckTypeMethodCallRule
	{
		$service = new PHPStan\Rules\Comparison\ImpossibleCheckTypeMethodCallRule($this->getService('039'), true);
		return $service;
	}


	public function createService0140(): PHPStan\Rules\Comparison\ImpossibleCheckTypeStaticMethodCallRule
	{
		$service = new PHPStan\Rules\Comparison\ImpossibleCheckTypeStaticMethodCallRule($this->getService('039'), true);
		return $service;
	}


	public function createService0141(): PHPStan\Rules\Comparison\StrictComparisonOfDifferentTypesRule
	{
		$service = new PHPStan\Rules\Comparison\StrictComparisonOfDifferentTypesRule(true);
		return $service;
	}


	public function createService0142(): PHPStan\Rules\Exceptions\DeadCatchRule
	{
		$service = new PHPStan\Rules\Exceptions\DeadCatchRule;
		return $service;
	}


	public function createService0143(): PHPStan\Rules\DeadCode\NoopRule
	{
		$service = new PHPStan\Rules\DeadCode\NoopRule($this->getService('06'));
		return $service;
	}


	public function createService0144(): PHPStan\Rules\DeadCode\UnreachableStatementRule
	{
		$service = new PHPStan\Rules\DeadCode\UnreachableStatementRule;
		return $service;
	}


	public function createService0145(): PHPStan\Rules\BooleansInConditions\BooleanRuleHelper
	{
		$service = new PHPStan\Rules\BooleansInConditions\BooleanRuleHelper($this->getService('046'));
		return $service;
	}


	public function createService0146(): PHPStan\Rules\Operators\OperatorRuleHelper
	{
		$service = new PHPStan\Rules\Operators\OperatorRuleHelper($this->getService('046'));
		return $service;
	}


	public function createService0147(): PHPStan\Rules\VariableVariables\VariablePropertyFetchRule
	{
		$service = new PHPStan\Rules\VariableVariables\VariablePropertyFetchRule($this->getService('broker'), ['stdClass', 'SimpleXMLElement']);
		return $service;
	}


	public function createServiceBroker(): PHPStan\Broker\Broker
	{
		$service = $this->getService('brokerFactory')->create();
		return $service;
	}


	public function createServiceBrokerFactory(): PHPStan\Broker\BrokerFactory
	{
		$service = new PHPStan\Broker\BrokerFactory($this);
		return $service;
	}


	public function createServiceCacheStorage(): PHPStan\Cache\FileCacheStorage
	{
		$service = new PHPStan\Cache\FileCacheStorage('/Users/mr_evrey/Sites/blog-gk/webmag-blog/.build/phpstan/cache/PHPStan');
		return $service;
	}


	public function createServiceContainer(): Container_e3e858657a
	{
		return $this;
	}


	public function createServiceDirectParser(): PHPStan\Parser\DirectParser
	{
		$service = new PHPStan\Parser\DirectParser($this->getService('05'), $this->getService('03'));
		return $service;
	}


	public function createServiceErrorFormatter__checkstyle(): PHPStan\Command\ErrorFormatter\CheckstyleErrorFormatter
	{
		$service = new PHPStan\Command\ErrorFormatter\CheckstyleErrorFormatter($this->getService('relativePathHelper'));
		return $service;
	}


	public function createServiceErrorFormatter__json(): PHPStan\Command\ErrorFormatter\JsonErrorFormatter
	{
		$service = new PHPStan\Command\ErrorFormatter\JsonErrorFormatter(false);
		return $service;
	}


	public function createServiceErrorFormatter__prettyJson(): PHPStan\Command\ErrorFormatter\JsonErrorFormatter
	{
		$service = new PHPStan\Command\ErrorFormatter\JsonErrorFormatter(true);
		return $service;
	}


	public function createServiceErrorFormatter__raw(): PHPStan\Command\ErrorFormatter\RawErrorFormatter
	{
		$service = new PHPStan\Command\ErrorFormatter\RawErrorFormatter;
		return $service;
	}


	public function createServiceErrorFormatter__table(): PHPStan\Command\ErrorFormatter\TableErrorFormatter
	{
		$service = new PHPStan\Command\ErrorFormatter\TableErrorFormatter($this->getService('relativePathHelper'));
		return $service;
	}


	public function createServiceRegistry(): PHPStan\Rules\Registry
	{
		$service = $this->getService('045')->create();
		return $service;
	}


	public function createServiceRelativePathHelper(): void
	{
		throw new Nette\DI\ServiceCreationException('Unable to create imported service \'relativePathHelper\', it must be added using addService()');
	}


	public function createServiceRules__0(): PHPStan\Rules\Deprecations\AccessDeprecatedPropertyRule
	{
		$service = new PHPStan\Rules\Deprecations\AccessDeprecatedPropertyRule($this->getService('broker'));
		return $service;
	}


	public function createServiceRules__1(): PHPStan\Rules\Deprecations\AccessDeprecatedStaticPropertyRule
	{
		$service = new PHPStan\Rules\Deprecations\AccessDeprecatedStaticPropertyRule($this->getService('broker'), $this->getService('046'));
		return $service;
	}


	public function createServiceRules__10(): PHPStan\Rules\Deprecations\UsageOfDeprecatedTraitRule
	{
		$service = new PHPStan\Rules\Deprecations\UsageOfDeprecatedTraitRule($this->getService('broker'));
		return $service;
	}


	public function createServiceRules__100(): PHPStan\Rules\VariableVariables\VariableVariablesRule
	{
		$service = new PHPStan\Rules\VariableVariables\VariableVariablesRule;
		return $service;
	}


	public function createServiceRules__11(): PHPStan\Rules\Arrays\DuplicateKeysInLiteralArraysRule
	{
		$service = new PHPStan\Rules\Arrays\DuplicateKeysInLiteralArraysRule($this->getService('06'));
		return $service;
	}


	public function createServiceRules__12(): PHPStan\Rules\Arrays\OffsetAccessWithoutDimForReadingRule
	{
		$service = new PHPStan\Rules\Arrays\OffsetAccessWithoutDimForReadingRule;
		return $service;
	}


	public function createServiceRules__13(): PHPStan\Rules\Classes\ClassConstantDeclarationRule
	{
		$service = new PHPStan\Rules\Classes\ClassConstantDeclarationRule;
		return $service;
	}


	public function createServiceRules__14(): PHPStan\Rules\Classes\ClassConstantRule
	{
		$service = new PHPStan\Rules\Classes\ClassConstantRule($this->getService('broker'), $this->getService('046'), $this->getService('037'));
		return $service;
	}


	public function createServiceRules__15(): PHPStan\Rules\Classes\ExistingClassesInClassImplementsRule
	{
		$service = new PHPStan\Rules\Classes\ExistingClassesInClassImplementsRule($this->getService('037'));
		return $service;
	}


	public function createServiceRules__16(): PHPStan\Rules\Classes\ExistingClassesInInterfaceExtendsRule
	{
		$service = new PHPStan\Rules\Classes\ExistingClassesInInterfaceExtendsRule($this->getService('037'));
		return $service;
	}


	public function createServiceRules__17(): PHPStan\Rules\Classes\ExistingClassInClassExtendsRule
	{
		$service = new PHPStan\Rules\Classes\ExistingClassInClassExtendsRule($this->getService('037'));
		return $service;
	}


	public function createServiceRules__18(): PHPStan\Rules\Classes\ExistingClassInTraitUseRule
	{
		$service = new PHPStan\Rules\Classes\ExistingClassInTraitUseRule($this->getService('037'));
		return $service;
	}


	public function createServiceRules__19(): PHPStan\Rules\Classes\InstantiationRule
	{
		$service = new PHPStan\Rules\Classes\InstantiationRule($this->getService('broker'), $this->getService('040'), $this->getService('037'));
		return $service;
	}


	public function createServiceRules__2(): PHPStan\Rules\Deprecations\CallToDeprecatedFunctionRule
	{
		$service = new PHPStan\Rules\Deprecations\CallToDeprecatedFunctionRule($this->getService('broker'));
		return $service;
	}


	public function createServiceRules__20(): PHPStan\Rules\Classes\RequireParentConstructCallRule
	{
		$service = new PHPStan\Rules\Classes\RequireParentConstructCallRule;
		return $service;
	}


	public function createServiceRules__21(): PHPStan\Rules\Classes\UnusedConstructorParametersRule
	{
		$service = new PHPStan\Rules\Classes\UnusedConstructorParametersRule($this->getService('047'));
		return $service;
	}


	public function createServiceRules__22(): PHPStan\Rules\Functions\CallToFunctionParametersRule
	{
		$service = new PHPStan\Rules\Functions\CallToFunctionParametersRule($this->getService('broker'), $this->getService('040'));
		return $service;
	}


	public function createServiceRules__23(): PHPStan\Rules\Functions\ExistingClassesInClosureTypehintsRule
	{
		$service = new PHPStan\Rules\Functions\ExistingClassesInClosureTypehintsRule($this->getService('041'));
		return $service;
	}


	public function createServiceRules__24(): PHPStan\Rules\Functions\ExistingClassesInTypehintsRule
	{
		$service = new PHPStan\Rules\Functions\ExistingClassesInTypehintsRule($this->getService('041'));
		return $service;
	}


	public function createServiceRules__25(): PHPStan\Rules\Functions\InnerFunctionRule
	{
		$service = new PHPStan\Rules\Functions\InnerFunctionRule;
		return $service;
	}


	public function createServiceRules__26(): PHPStan\Rules\Functions\NonExistentDefinedFunctionRule
	{
		$service = new PHPStan\Rules\Functions\NonExistentDefinedFunctionRule($this->getService('broker'));
		return $service;
	}


	public function createServiceRules__27(): PHPStan\Rules\Functions\PrintfParametersRule
	{
		$service = new PHPStan\Rules\Functions\PrintfParametersRule;
		return $service;
	}


	public function createServiceRules__28(): PHPStan\Rules\Functions\UnusedClosureUsesRule
	{
		$service = new PHPStan\Rules\Functions\UnusedClosureUsesRule($this->getService('047'));
		return $service;
	}


	public function createServiceRules__29(): PHPStan\Rules\Methods\ExistingClassesInTypehintsRule
	{
		$service = new PHPStan\Rules\Methods\ExistingClassesInTypehintsRule($this->getService('041'));
		return $service;
	}


	public function createServiceRules__3(): PHPStan\Rules\Deprecations\CallToDeprecatedMethodRule
	{
		$service = new PHPStan\Rules\Deprecations\CallToDeprecatedMethodRule($this->getService('broker'));
		return $service;
	}


	public function createServiceRules__30(): PHPStan\Rules\Properties\AccessPropertiesInAssignRule
	{
		$service = new PHPStan\Rules\Properties\AccessPropertiesInAssignRule($this->getService('0120'));
		return $service;
	}


	public function createServiceRules__31(): PHPStan\Rules\Properties\AccessStaticPropertiesInAssignRule
	{
		$service = new PHPStan\Rules\Properties\AccessStaticPropertiesInAssignRule($this->getService('0121'));
		return $service;
	}


	public function createServiceRules__32(): PHPStan\Rules\Variables\ThisVariableRule
	{
		$service = new PHPStan\Rules\Variables\ThisVariableRule;
		return $service;
	}


	public function createServiceRules__33(): PHPStan\Rules\Constants\ConstantRule
	{
		$service = new PHPStan\Rules\Constants\ConstantRule;
		return $service;
	}


	public function createServiceRules__34(): PHPStan\Rules\Variables\VariableCertaintyInIssetRule
	{
		$service = new PHPStan\Rules\Variables\VariableCertaintyInIssetRule;
		return $service;
	}


	public function createServiceRules__35(): PHPStan\Rules\Cast\EchoRule
	{
		$service = new PHPStan\Rules\Cast\EchoRule($this->getService('046'));
		return $service;
	}


	public function createServiceRules__36(): PHPStan\Rules\Cast\InvalidCastRule
	{
		$service = new PHPStan\Rules\Cast\InvalidCastRule($this->getService('broker'), $this->getService('046'));
		return $service;
	}


	public function createServiceRules__37(): PHPStan\Rules\Cast\InvalidPartOfEncapsedStringRule
	{
		$service = new PHPStan\Rules\Cast\InvalidPartOfEncapsedStringRule($this->getService('06'), $this->getService('046'));
		return $service;
	}


	public function createServiceRules__38(): PHPStan\Rules\Cast\PrintRule
	{
		$service = new PHPStan\Rules\Cast\PrintRule($this->getService('046'));
		return $service;
	}


	public function createServiceRules__39(): PHPStan\Rules\Functions\IncompatibleDefaultParameterTypeRule
	{
		$service = new PHPStan\Rules\Functions\IncompatibleDefaultParameterTypeRule($this->getService('broker'));
		return $service;
	}


	public function createServiceRules__4(): PHPStan\Rules\Deprecations\CallToDeprecatedStaticMethodRule
	{
		$service = new PHPStan\Rules\Deprecations\CallToDeprecatedStaticMethodRule($this->getService('broker'), $this->getService('046'));
		return $service;
	}


	public function createServiceRules__40(): PHPStan\Rules\Methods\IncompatibleDefaultParameterTypeRule
	{
		$service = new PHPStan\Rules\Methods\IncompatibleDefaultParameterTypeRule;
		return $service;
	}


	public function createServiceRules__41(): PHPStan\Rules\Operators\InvalidBinaryOperationRule
	{
		$service = new PHPStan\Rules\Operators\InvalidBinaryOperationRule($this->getService('06'), $this->getService('046'));
		return $service;
	}


	public function createServiceRules__42(): PHPStan\Rules\Operators\InvalidUnaryOperationRule
	{
		$service = new PHPStan\Rules\Operators\InvalidUnaryOperationRule;
		return $service;
	}


	public function createServiceRules__43(): PHPStan\Rules\Operators\InvalidComparisonOperationRule
	{
		$service = new PHPStan\Rules\Operators\InvalidComparisonOperationRule($this->getService('046'));
		return $service;
	}


	public function createServiceRules__44(): PHPStan\Rules\PhpDoc\IncompatiblePhpDocTypeRule
	{
		$service = new PHPStan\Rules\PhpDoc\IncompatiblePhpDocTypeRule($this->getService('048'));
		return $service;
	}


	public function createServiceRules__45(): PHPStan\Rules\PhpDoc\IncompatiblePropertyPhpDocTypeRule
	{
		$service = new PHPStan\Rules\PhpDoc\IncompatiblePropertyPhpDocTypeRule;
		return $service;
	}


	public function createServiceRules__46(): PHPStan\Rules\PhpDoc\InvalidPhpDocTagValueRule
	{
		$service = new PHPStan\Rules\PhpDoc\InvalidPhpDocTagValueRule($this->getService('08'), $this->getService('011'));
		return $service;
	}


	public function createServiceRules__47(): PHPStan\Rules\PhpDoc\InvalidThrowsPhpDocValueRule
	{
		$service = new PHPStan\Rules\PhpDoc\InvalidThrowsPhpDocValueRule($this->getService('048'));
		return $service;
	}


	public function createServiceRules__48(): PHPStan\Rules\Arrays\AppendedArrayItemTypeRule
	{
		$service = new PHPStan\Rules\Arrays\AppendedArrayItemTypeRule($this->getService('044'), $this->getService('046'));
		return $service;
	}


	public function createServiceRules__49(): PHPStan\Rules\Arrays\IterableInForeachRule
	{
		$service = new PHPStan\Rules\Arrays\IterableInForeachRule($this->getService('046'));
		return $service;
	}


	public function createServiceRules__5(): PHPStan\Rules\Deprecations\FetchingClassConstOfDeprecatedClassRule
	{
		$service = new PHPStan\Rules\Deprecations\FetchingClassConstOfDeprecatedClassRule($this->getService('broker'), $this->getService('046'));
		return $service;
	}


	public function createServiceRules__50(): PHPStan\Rules\Arrays\OffsetAccessAssignmentRule
	{
		$service = new PHPStan\Rules\Arrays\OffsetAccessAssignmentRule($this->getService('046'));
		return $service;
	}


	public function createServiceRules__51(): PHPStan\Rules\Arrays\OffsetAccessAssignOpRule
	{
		$service = new PHPStan\Rules\Arrays\OffsetAccessAssignOpRule($this->getService('046'));
		return $service;
	}


	public function createServiceRules__52(): PHPStan\Rules\Functions\ClosureReturnTypeRule
	{
		$service = new PHPStan\Rules\Functions\ClosureReturnTypeRule($this->getService('042'));
		return $service;
	}


	public function createServiceRules__53(): PHPStan\Rules\Functions\ReturnTypeRule
	{
		$service = new PHPStan\Rules\Functions\ReturnTypeRule($this->getService('042'));
		return $service;
	}


	public function createServiceRules__54(): PHPStan\Rules\Methods\ReturnTypeRule
	{
		$service = new PHPStan\Rules\Methods\ReturnTypeRule($this->getService('042'));
		return $service;
	}


	public function createServiceRules__55(): PHPStan\Rules\Properties\DefaultValueTypesAssignedToPropertiesRule
	{
		$service = new PHPStan\Rules\Properties\DefaultValueTypesAssignedToPropertiesRule($this->getService('046'));
		return $service;
	}


	public function createServiceRules__56(): PHPStan\Rules\Properties\TypesAssignedToPropertiesRule
	{
		$service = new PHPStan\Rules\Properties\TypesAssignedToPropertiesRule($this->getService('046'), $this->getService('043'), $this->getService('044'));
		return $service;
	}


	public function createServiceRules__57(): PHPStan\Rules\Variables\ThrowTypeRule
	{
		$service = new PHPStan\Rules\Variables\ThrowTypeRule($this->getService('046'));
		return $service;
	}


	public function createServiceRules__58(): PHPStan\Rules\Variables\VariableCloningRule
	{
		$service = new PHPStan\Rules\Variables\VariableCloningRule($this->getService('046'));
		return $service;
	}


	public function createServiceRules__59(): PHPStan\Rules\Arrays\DeadForeachRule
	{
		$service = new PHPStan\Rules\Arrays\DeadForeachRule;
		return $service;
	}


	public function createServiceRules__6(): PHPStan\Rules\Deprecations\ImplementationOfDeprecatedInterfaceRule
	{
		$service = new PHPStan\Rules\Deprecations\ImplementationOfDeprecatedInterfaceRule($this->getService('broker'));
		return $service;
	}


	public function createServiceRules__60(): PHPStan\Rules\Comparison\BooleanAndConstantConditionRule
	{
		$service = new PHPStan\Rules\Comparison\BooleanAndConstantConditionRule($this->getService('038'));
		return $service;
	}


	public function createServiceRules__61(): PHPStan\Rules\Comparison\BooleanNotConstantConditionRule
	{
		$service = new PHPStan\Rules\Comparison\BooleanNotConstantConditionRule($this->getService('038'));
		return $service;
	}


	public function createServiceRules__62(): PHPStan\Rules\Comparison\BooleanOrConstantConditionRule
	{
		$service = new PHPStan\Rules\Comparison\BooleanOrConstantConditionRule($this->getService('038'));
		return $service;
	}


	public function createServiceRules__63(): PHPStan\Rules\Comparison\ElseIfConstantConditionRule
	{
		$service = new PHPStan\Rules\Comparison\ElseIfConstantConditionRule($this->getService('038'));
		return $service;
	}


	public function createServiceRules__64(): PHPStan\Rules\Comparison\IfConstantConditionRule
	{
		$service = new PHPStan\Rules\Comparison\IfConstantConditionRule($this->getService('038'));
		return $service;
	}


	public function createServiceRules__65(): PHPStan\Rules\Comparison\TernaryOperatorConstantConditionRule
	{
		$service = new PHPStan\Rules\Comparison\TernaryOperatorConstantConditionRule($this->getService('038'));
		return $service;
	}


	public function createServiceRules__66(): PHPStan\Rules\Comparison\UnreachableIfBranchesRule
	{
		$service = new PHPStan\Rules\Comparison\UnreachableIfBranchesRule($this->getService('038'));
		return $service;
	}


	public function createServiceRules__67(): PHPStan\Rules\Comparison\UnreachableTernaryElseBranchRule
	{
		$service = new PHPStan\Rules\Comparison\UnreachableTernaryElseBranchRule($this->getService('038'));
		return $service;
	}


	public function createServiceRules__68(): PHPStan\Rules\BooleansInConditions\BooleanInBooleanAndRule
	{
		$service = new PHPStan\Rules\BooleansInConditions\BooleanInBooleanAndRule($this->getService('0145'));
		return $service;
	}


	public function createServiceRules__69(): PHPStan\Rules\BooleansInConditions\BooleanInBooleanNotRule
	{
		$service = new PHPStan\Rules\BooleansInConditions\BooleanInBooleanNotRule($this->getService('0145'));
		return $service;
	}


	public function createServiceRules__7(): PHPStan\Rules\Deprecations\InheritanceOfDeprecatedClassRule
	{
		$service = new PHPStan\Rules\Deprecations\InheritanceOfDeprecatedClassRule($this->getService('broker'));
		return $service;
	}


	public function createServiceRules__70(): PHPStan\Rules\BooleansInConditions\BooleanInBooleanOrRule
	{
		$service = new PHPStan\Rules\BooleansInConditions\BooleanInBooleanOrRule($this->getService('0145'));
		return $service;
	}


	public function createServiceRules__71(): PHPStan\Rules\BooleansInConditions\BooleanInElseIfConditionRule
	{
		$service = new PHPStan\Rules\BooleansInConditions\BooleanInElseIfConditionRule($this->getService('0145'));
		return $service;
	}


	public function createServiceRules__72(): PHPStan\Rules\BooleansInConditions\BooleanInIfConditionRule
	{
		$service = new PHPStan\Rules\BooleansInConditions\BooleanInIfConditionRule($this->getService('0145'));
		return $service;
	}


	public function createServiceRules__73(): PHPStan\Rules\BooleansInConditions\BooleanInTernaryOperatorRule
	{
		$service = new PHPStan\Rules\BooleansInConditions\BooleanInTernaryOperatorRule($this->getService('0145'));
		return $service;
	}


	public function createServiceRules__74(): PHPStan\Rules\Cast\UselessCastRule
	{
		$service = new PHPStan\Rules\Cast\UselessCastRule;
		return $service;
	}


	public function createServiceRules__75(): PHPStan\Rules\DisallowedConstructs\DisallowedEmptyRule
	{
		$service = new PHPStan\Rules\DisallowedConstructs\DisallowedEmptyRule;
		return $service;
	}


	public function createServiceRules__76(): PHPStan\Rules\DisallowedConstructs\DisallowedImplicitArrayCreationRule
	{
		$service = new PHPStan\Rules\DisallowedConstructs\DisallowedImplicitArrayCreationRule;
		return $service;
	}


	public function createServiceRules__77(): PHPStan\Rules\ForeachLoop\OverwriteVariablesWithForeachRule
	{
		$service = new PHPStan\Rules\ForeachLoop\OverwriteVariablesWithForeachRule;
		return $service;
	}


	public function createServiceRules__78(): PHPStan\Rules\Functions\MissingFunctionParameterTypehintRule
	{
		$service = new PHPStan\Rules\Functions\MissingFunctionParameterTypehintRule($this->getService('broker'));
		return $service;
	}


	public function createServiceRules__79(): PHPStan\Rules\Functions\MissingFunctionReturnTypehintRule
	{
		$service = new PHPStan\Rules\Functions\MissingFunctionReturnTypehintRule($this->getService('broker'));
		return $service;
	}


	public function createServiceRules__8(): PHPStan\Rules\Deprecations\InheritanceOfDeprecatedInterfaceRule
	{
		$service = new PHPStan\Rules\Deprecations\InheritanceOfDeprecatedInterfaceRule($this->getService('broker'));
		return $service;
	}


	public function createServiceRules__80(): PHPStan\Rules\Methods\MissingMethodParameterTypehintRule
	{
		$service = new PHPStan\Rules\Methods\MissingMethodParameterTypehintRule;
		return $service;
	}


	public function createServiceRules__81(): PHPStan\Rules\Methods\MissingMethodReturnTypehintRule
	{
		$service = new PHPStan\Rules\Methods\MissingMethodReturnTypehintRule;
		return $service;
	}


	public function createServiceRules__82(): PHPStan\Rules\Methods\WrongCaseOfInheritedMethodRule
	{
		$service = new PHPStan\Rules\Methods\WrongCaseOfInheritedMethodRule;
		return $service;
	}


	public function createServiceRules__83(): PHPStan\Rules\Operators\OperandInArithmeticPostDecrementRule
	{
		$service = new PHPStan\Rules\Operators\OperandInArithmeticPostDecrementRule($this->getService('0146'));
		return $service;
	}


	public function createServiceRules__84(): PHPStan\Rules\Operators\OperandInArithmeticPostIncrementRule
	{
		$service = new PHPStan\Rules\Operators\OperandInArithmeticPostIncrementRule($this->getService('0146'));
		return $service;
	}


	public function createServiceRules__85(): PHPStan\Rules\Operators\OperandInArithmeticPreDecrementRule
	{
		$service = new PHPStan\Rules\Operators\OperandInArithmeticPreDecrementRule($this->getService('0146'));
		return $service;
	}


	public function createServiceRules__86(): PHPStan\Rules\Operators\OperandInArithmeticPreIncrementRule
	{
		$service = new PHPStan\Rules\Operators\OperandInArithmeticPreIncrementRule($this->getService('0146'));
		return $service;
	}


	public function createServiceRules__87(): PHPStan\Rules\Operators\OperandsInArithmeticAdditionRule
	{
		$service = new PHPStan\Rules\Operators\OperandsInArithmeticAdditionRule($this->getService('0146'));
		return $service;
	}


	public function createServiceRules__88(): PHPStan\Rules\Operators\OperandsInArithmeticDivisionRule
	{
		$service = new PHPStan\Rules\Operators\OperandsInArithmeticDivisionRule($this->getService('0146'));
		return $service;
	}


	public function createServiceRules__89(): PHPStan\Rules\Operators\OperandsInArithmeticExponentiationRule
	{
		$service = new PHPStan\Rules\Operators\OperandsInArithmeticExponentiationRule($this->getService('0146'));
		return $service;
	}


	public function createServiceRules__9(): PHPStan\Rules\Deprecations\InstantiationOfDeprecatedClassRule
	{
		$service = new PHPStan\Rules\Deprecations\InstantiationOfDeprecatedClassRule($this->getService('broker'), $this->getService('046'));
		return $service;
	}


	public function createServiceRules__90(): PHPStan\Rules\Operators\OperandsInArithmeticModuloRule
	{
		$service = new PHPStan\Rules\Operators\OperandsInArithmeticModuloRule($this->getService('0146'));
		return $service;
	}


	public function createServiceRules__91(): PHPStan\Rules\Operators\OperandsInArithmeticMultiplicationRule
	{
		$service = new PHPStan\Rules\Operators\OperandsInArithmeticMultiplicationRule($this->getService('0146'));
		return $service;
	}


	public function createServiceRules__92(): PHPStan\Rules\Operators\OperandsInArithmeticSubtractionRule
	{
		$service = new PHPStan\Rules\Operators\OperandsInArithmeticSubtractionRule($this->getService('0146'));
		return $service;
	}


	public function createServiceRules__93(): PHPStan\Rules\Properties\MissingPropertyTypehintRule
	{
		$service = new PHPStan\Rules\Properties\MissingPropertyTypehintRule;
		return $service;
	}


	public function createServiceRules__94(): PHPStan\Rules\StrictCalls\DynamicCallOnStaticMethodsRule
	{
		$service = new PHPStan\Rules\StrictCalls\DynamicCallOnStaticMethodsRule($this->getService('046'));
		return $service;
	}


	public function createServiceRules__95(): PHPStan\Rules\StrictCalls\StrictFunctionCallsRule
	{
		$service = new PHPStan\Rules\StrictCalls\StrictFunctionCallsRule($this->getService('broker'));
		return $service;
	}


	public function createServiceRules__96(): PHPStan\Rules\SwitchConditions\MatchingTypeInSwitchCaseConditionRule
	{
		$service = new PHPStan\Rules\SwitchConditions\MatchingTypeInSwitchCaseConditionRule($this->getService('06'));
		return $service;
	}


	public function createServiceRules__97(): PHPStan\Rules\VariableVariables\VariableMethodCallRule
	{
		$service = new PHPStan\Rules\VariableVariables\VariableMethodCallRule;
		return $service;
	}


	public function createServiceRules__98(): PHPStan\Rules\VariableVariables\VariableStaticMethodCallRule
	{
		$service = new PHPStan\Rules\VariableVariables\VariableStaticMethodCallRule;
		return $service;
	}


	public function createServiceRules__99(): PHPStan\Rules\VariableVariables\VariableStaticPropertyFetchRule
	{
		$service = new PHPStan\Rules\VariableVariables\VariableStaticPropertyFetchRule;
		return $service;
	}


	public function createServiceTypeNodeResolverFactory(): PHPStan\PhpDoc\TypeNodeResolverFactory
	{
		$service = new PHPStan\PhpDoc\TypeNodeResolverFactory($this);
		return $service;
	}


	public function createServiceTypeSpecifier(): PHPStan\Analyser\TypeSpecifier
	{
		$service = $this->getService('typeSpecifierFactory')->create();
		return $service;
	}


	public function createServiceTypeSpecifierFactory(): PHPStan\Analyser\TypeSpecifierFactory
	{
		$service = new PHPStan\Analyser\TypeSpecifierFactory($this);
		return $service;
	}


	public function initialize()
	{
	}
}
