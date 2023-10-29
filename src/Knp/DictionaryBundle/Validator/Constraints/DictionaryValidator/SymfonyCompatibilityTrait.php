<?php

declare(strict_types=1);

namespace Knp\DictionaryBundle\Validator\Constraints\DictionaryValidator;

use Composer\InstalledVersions;
use Exception;
use Knp\DictionaryBundle\Validator\Constraints\Dictionary;
use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Constraint;

// since the tacman version only supports 6.3+, there are no issues with compatibility

//switch ($version = substr((string) InstalledVersions::getVersion('symfony/validator'), 0, 3)) {
//    default:
//        throw new Exception('knplabs/dictionary-bundle is not compatible with the current version of symfony/validator: '.$version);
//}
