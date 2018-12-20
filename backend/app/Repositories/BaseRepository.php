<?php

namespace App\Repositories;

class BaseRepository
{
    /**
    * the current record we are working in
    *
    * @var \App\$this->_model
    */
    protected $_record;

    /**
     * The total number of records before slicing.
     *
     * @var int
     */
    protected $_total;

    /**
     * the model of the Repository
     *
     * @var string
     */
    protected $_model;

    /**
     * get the record which has $field=$value from the propety $_record or from DB
     *
     * @param  string $field
     * @param  mixed $value
     * @return \App\$this->_model
     */
    public function getBy(string $field, $value)
    {
        if (empty($this->_record) || $this->_record->$field !== $value) {
            $this->_record = $this->_model::where($field, $value)->firstOrFail();
        }

        return $this->_record;
    }

    /**
     * Get the total number of records being paginated.
     *
     * @return int
     */
    public function getTotalPaginated()
    {
        return $this->_total;
    }

    /**
     * Get the total number of the records
     *
     * @return int
     */
    public function count()
    {
        return $this->_model::count();
    }

}
