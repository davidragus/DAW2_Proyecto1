<?php

namespace App\Models;

class Log
{

	protected $log_id, $user_id, $action, $type, $id, $timestamp;

	public function getLogId()
	{
		return $this->log_id;
	}

	public function getUserId()
	{
		return $this->user_id;
	}

	public function getAction()
	{
		return $this->action;
	}

	public function getType()
	{
		return $this->type;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getTimestamp()
	{
		return $this->timestamp;
	}

	public function toArray()
	{
		return [
			'log_id' => $this->getLogId(),
			'user_id' => $this->getUserId(),
			'action' => $this->getAction(),
			'type' => $this->getType(),
			'id' => $this->getId(),
			'timestamp' => $this->getTimestamp()
		];
	}

}