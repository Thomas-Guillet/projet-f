<?php
namespace App\Models\Entities;

class Thread
{
	private $id, $date_creation, $title, $status;

	public function setId($id)
    {
		$this->id = $id;

		return $this;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setDateCreation($date_creation)
	{
		$this->date_creation = $date_creation;

		return $this;
	}

	public function getDateCreation()
	{
		return $this->date_creation;
	}

	public function setTitle($title)
	{
		$this->title = $title;

		return $this;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setStatus($status)
	{
		$this->status = $status;

		return $this;
	}

	public function getStatus()
	{
		return $this->status;
	}
}