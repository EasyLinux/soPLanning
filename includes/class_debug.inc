<?php

class Debug
{
    /**
     * The debug array of the application.
     * @var		array 
     */
	protected $debugLog = array();

    /**
     * This is the constructor required to create an object.
     */
	public function __construct()
	{
	}

    /**
     * Print $debugLog array.
	 */
	public function printLogs()
	{
    echo "<table width=100%>\n";
    echo " <tr>\n  <td>varName</td><td>varValue</td><td>Comment</td>\n </tr>\n";
    foreach( $this->debugLog as $Dbg)
    {
      echo " <tr>\n  <td>". $Dbg['Name']."</td><td>". $Dbg['Value']."</td><td>". $Dbg['Comment']."</td>\n </tr>";
      //print_r($Dbg);
    }
    echo "</table>";
	}

    /**
     * Add a trace on the $debugLog array.
	 * @param	string	$varName    debug variable name
	 * @param	string	$varValue   debug variable content
	 */ 
	public function add($varName, $varValue, $Comment)
	{
    if( gettype($varValue) == "array" || gettype($varValue) == "object")
    {
      $Value = nl2br(print_r($varValue,true));
      $this->debugLog[] = array( 'Name' => $varName, 'Value' => $Value, 'Comment' => $Comment);
      
    }
    else
      $this->debugLog[] = array( 'Name' => $varName, 'Value' => $varValue, 'Comment' => $Comment);
	}

}
?>