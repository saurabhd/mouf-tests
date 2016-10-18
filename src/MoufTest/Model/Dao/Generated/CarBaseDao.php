<?php

/*
 * This file has been automatically generated by TDBM.
 * DO NOT edit this file, as it might be overwritten.
 * If you need to perform changes, edit the CarDao class instead!
 */

namespace MoufTest\Model\Dao\Generated;

use Mouf\Database\TDBM\TDBMService;
use Mouf\Database\TDBM\ResultIterator;
use Mouf\Database\TDBM\ArrayIterator;
use MoufTest\Model\Bean\CarBean;


/**
 * The CarBaseDao class will maintain the persistence of CarBean class into the cars table.
 *
 */
class CarBaseDao
{

    /**
     * @var TDBMService
     */
    protected $tdbmService;

    /**
     * The default sort column.
     *
     * @var string
     */
    private $defaultSort = null;

    /**
     * The default sort direction.
     *
     * @var string
     */
    private $defaultDirection = 'asc';

    /**
     * Sets the TDBM service used by this DAO.
     *
     * @param TDBMService $tdbmService
     */
    public function __construct(TDBMService $tdbmService)
    {
        $this->tdbmService = $tdbmService;
    }

    /**
     * Persist the CarBean instance.
     *
     * @param CarBean $obj The bean to save.
     */
    public function save(CarBean $obj)
    {
        $this->tdbmService->save($obj);
    }

    /**
     * Get all Car records.
     *
     * @return CarBean[]|ResultIterator|ResultArray
     */
    public function findAll()
    {
        if ($this->defaultSort) {
            $orderBy = 'cars.'.$this->defaultSort.' '.$this->defaultDirection;
        } else {
            $orderBy = null;
        }
        return $this->tdbmService->findObjects('cars',  null, [], $orderBy);
    }
    
    /**
     * Get CarBean specified by its ID (its primary key)
     * If the primary key does not exist, an exception is thrown.
     *
     * @param string|int $id
     * @param bool $lazyLoading If set to true, the object will not be loaded right away. Instead, it will be loaded when you first try to access a method of the object.
     * @return CarBean
     * @throws TDBMException
     */
    public function getById(int $id, $lazyLoading = false)
    {
        return $this->tdbmService->findObjectByPk('cars', ['id' => $id], [], $lazyLoading);
    }
    
    /**
     * Deletes the CarBean passed in parameter.
     *
     * @param CarBean $obj object to delete
     * @param bool $cascade if true, it will delete all object linked to $obj
     */
    public function delete(CarBean $obj, $cascade = false)
    {
        if ($cascade === true) {
            $this->tdbmService->deleteCascade($obj);
        } else {
            $this->tdbmService->delete($obj);
        }
    }


    /**
     * Get a list of CarBean specified by its filters.
     *
     * @param mixed $filter The filter bag (see TDBMService::findObjects for complete description)
     * @param array $parameters The parameters associated with the filter
     * @param mixed $orderBy The order string
     * @param array $additionalTablesFetch A list of additional tables to fetch (for performance improvement)
     * @param int $mode Either TDBMService::MODE_ARRAY or TDBMService::MODE_CURSOR (for large datasets). Defaults to TDBMService::MODE_ARRAY.
     * @return CarBean[]|ResultIterator|ResultArray
     */
    protected function find($filter = null, array $parameters = [], $orderBy=null, array $additionalTablesFetch = [], $mode = null)
    {
        if ($this->defaultSort && $orderBy == null) {
            $orderBy = 'cars.'.$this->defaultSort.' '.$this->defaultDirection;
        }
        return $this->tdbmService->findObjects('cars', $filter, $parameters, $orderBy, $additionalTablesFetch, $mode);
    }

    /**
     * Get a list of CarBean specified by its filters.
     * Unlike the `find` method that guesses the FROM part of the statement, here you can pass the $from part.
     *
     * You should not put an alias on the main table name. So your $from variable should look like:
     *
     *   "cars JOIN ... ON ..."
     *
     * @param string $from The sql from statement
     * @param mixed $filter The filter bag (see TDBMService::findObjects for complete description)
     * @param array $parameters The parameters associated with the filter
     * @param mixed $orderBy The order string
     * @param int $mode Either TDBMService::MODE_ARRAY or TDBMService::MODE_CURSOR (for large datasets). Defaults to TDBMService::MODE_ARRAY.
     * @return CarBean[]|ResultIterator|ResultArray
     */
    protected function findFromSql($from, $filter = null, array $parameters = [], $orderBy=null, $mode = null)
    {
        if ($this->defaultSort && $orderBy == null) {
            $orderBy = 'cars.'.$this->defaultSort.' '.$this->defaultDirection;
        }
        return $this->tdbmService->findObjectsFromSql('cars', $from, $filter, $parameters, $orderBy, $mode);
    }

    /**
     * Get a single CarBean specified by its filters.
     *
     * @param mixed $filter The filter bag (see TDBMService::findObjects for complete description)
     * @param array $parameters The parameters associated with the filter
     * @return CarBean
     */
    protected function findOne($filter=null, array $parameters = [])
    {
        return $this->tdbmService->findObject('cars', $filter, $parameters);
    }

    /**
     * Get a single CarBean specified by its filters.
     * Unlike the `find` method that guesses the FROM part of the statement, here you can pass the $from part.
     *
     * You should not put an alias on the main table name. So your $from variable should look like:
     *
     *   "cars JOIN ... ON ..."
     *
     * @param string $from The sql from statement
     * @param mixed $filter The filter bag (see TDBMService::findObjects for complete description)
     * @param array $parameters The parameters associated with the filter
     * @return CarBean
     */
    protected function findOneFromSql($from, $filter=null, array $parameters = [])
    {
        return $this->tdbmService->findObjectFromSql('cars', $from, $filter, $parameters);
    }

    /**
     * Sets the default column for default sorting.
     *
     * @param string $defaultSort
     */
    public function setDefaultSort($defaultSort)
    {
        $this->defaultSort = $defaultSort;
    }
}