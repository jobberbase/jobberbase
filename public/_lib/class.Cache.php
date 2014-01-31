<?php
/**
 * jobberbase job board platform
 *
 * Cache class handles cache operations
 */

class Cache
{

    var $cacheDir = null;
    var $cacheID = null;
    var $cacheTime = null;
    var $useCache = null;
	
    /** 
     * @param $dir folder where cache will be saved
     * @param $time (int) time in seconds; if null cache doesn't expire
     * @param $use_cache (boolean) 
     */
	public function __construct($dir, $time = null, $use_cache = true)
	{ 
        if (!is_dir($dir)) {
            throw new Exception($dir . " doesn't exist");
        }
        if ($use_cache !== true && $use_cache !== false) {
            throw new Exception("\$use_cache is not valid. Must be 'true' or 'false'");
        }
        if ($time !== null && !is_int($time)) {
            throw new Exception("cache time must be null or int");
        }
        $this->cacheDir = $dir;
        $this->cacheTime = $time;
        $this->useCache = $use_cache;
        $this->setCache();
    }

    protected function setCache() 
    {
        //Caching options
        $options = array('cacheDir' => $this->cacheDir,
                        'lifeTime' => $this->cacheTime, 
                        'caching' => $this->useCache);       
        $cache = new Cache_Lite($options);
        $this->liteCache = $cache;
    }

    public function testCache($identifier, $group = 'default') 
    {
        return $this->liteCache->get($identifier, $group);
    }

    public function saveCache($data, $identifier, $group = 'default')
    {
        return $this->liteCache->save(serialize($data), $identifier, $group);
    }

    public function loadCache($identifier, $group = 'default') 
    {
        if ($data = $this->liteCache->get($identifier, $group))
        {
            return unserialize($data);
        }
        else
        {
            return false;
        }
    }

    public function removeCache($identifier, $group = 'default') 
    {
        return $this->liteCache->remove($identifier, $group);
    }

    public function cleanCache($group = false) 
    {
        return $this->liteCache->clean($group);
    }

}
?>
