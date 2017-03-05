<?php
/**
 * Created by PhpStorm.
 * User: Cox
 * Date: 02.03.2017
 * Time: 00:33
 */

namespace PHTH\Sportresults\Domain\Repository;


class Repository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = array(
        'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    );

}