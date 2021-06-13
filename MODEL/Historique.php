<?php

include_once(__DIR__ ."/Details.php");

class Historique
{

    private int $id;
    private string $action;
    private string $dateAction;

    private int $idDetail;
    private int $version;

    private string $temperature;
    private string $speed;
    private string $flux;
    private string $energy;
    private bool $breakdown;
    private string $startActivation;
    private string $duration;
    private int $idModule;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of action
     */ 
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set the value of action
     *
     * @return  self
     */ 
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get the value of dateAction
     */ 
    public function getDateAction()
    {
        return $this->dateAction;
    }

    /**
     * Set the value of dateAction
     *
     * @return  self
     */ 
    public function setDateAction($dateAction)
    {
        $this->dateAction = $dateAction;

        return $this;
    }

    /**
     * Get the value of idDetail
     */ 
    public function getIdDetail()
    {
        return $this->idDetail;
    }

    /**
     * Set the value of idDetail
     *
     * @return  self
     */ 
    public function setIdDetail($idDetail)
    {
        $this->idDetail = $idDetail;

        return $this;
    }

    /**
     * Get the value of version
     */ 
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set the value of version
     *
     * @return  self
     */ 
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get the value of temperature
     */ 
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * Set the value of temperature
     *
     * @return  self
     */ 
    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;

        return $this;
    }

    /**
     * Get the value of speed
     */ 
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Set the value of speed
     *
     * @return  self
     */ 
    public function setSpeed($speed)
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * Get the value of flux
     */ 
    public function getFlux()
    {
        return $this->flux;
    }

    /**
     * Set the value of flux
     *
     * @return  self
     */ 
    public function setFlux($flux)
    {
        $this->flux = $flux;

        return $this;
    }

    /**
     * Get the value of energy
     */ 
    public function getEnergy()
    {
        return $this->energy;
    }

    /**
     * Set the value of energy
     *
     * @return  self
     */ 
    public function setEnergy($energy)
    {
        $this->energy = $energy;

        return $this;
    }

    /**
     * Get the value of breakdown
     */ 
    public function getBreakdown()
    {
        return $this->breakdown;
    }

    /**
     * Set the value of breakdown
     *
     * @return  self
     */ 
    public function setBreakdown($breakdown)
    {
        $this->breakdown = $breakdown;

        return $this;
    }

    /**
     * Get the value of startActivation
     */ 
    public function getStartActivation()
    {
        return $this->startActivation;
    }

    /**
     * Set the value of startActivation
     *
     * @return  self
     */ 
    public function setStartActivation($startActivation)
    {
        $this->startActivation = $startActivation;

        return $this;
    }

    /**
     * Get the value of duration
     */ 
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set the value of duration
     *
     * @return  self
     */ 
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get the value of idModule
     */ 
    public function getIdModule()
    {
        return $this->idModule;
    }

    /**
     * Set the value of idModule
     *
     * @return  self
     */ 
    public function setIdModule($idModule)
    {
        $this->idModule = $idModule;

        return $this;
    }
}

?>