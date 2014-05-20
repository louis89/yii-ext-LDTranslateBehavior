<?php
/**
 * LDTranslateBehavior class file.
 *
 * @author Louis A. DaPrato <l.daprato@gmail.com>
 * @link https://lou-d.com
 * @copyright 2014 Louis A. DaPrato
 * @license The MIT License (MIT)
 * @since 1.0
 */

/**
 * This is a behavior to simplify translating appliction component messages by specifying a default category, source, and language
 * Optionally exceptions thrown during a translation can be caught and the original, untranslated, message returned if desired.
 * 
 * @property string $tCategory The category to use for message translations. Defaults to "default".
 * @property string $tSource Which message source application component to use. Defaults to null.
 * @property string $tLanguage The target language. Defaults to null.
 * @property boolean $tCatchExceptions Whether to allow exceptions during message translations. 
 * 	If True and an exception is thrown while translating a message the exception will be caught and the original message will be returned.
 * 	If False and an exception is thrown while translating a message the exception will not be caught (normal operation).
 *  Defaults to false.
 * 
 * @author Louis A. DaPrato <l.daprato@gmail.com>
 * @since 1.0
 */
class LDTranslateBehavior extends CBehavior
{
	
	/**
	 * @var string The category to use for message translations. Defaults to "default".
	 */
	public $tCategory = 'default';
	
	/**
	 * @var string which message source application component to use. Defaults to null.
	 */
	public $tSource;
	
	/**
	 * @var string the target language. Defaults to null.
	 */
	public $tLanguage;
	
	/**
	 * @var boolean Whether to catch exceptions thrown during message translations. Defaults to False.
	 */
	public $tCatchExceptions = false;

	/**
	 * Translates a message. (see {@link YiiBase::t}) for more details.
	 * 
	 * @param string $message the original message
	 * @param array $params parameters to be applied to the message using <code>strtr</code>.
	 * @return string the translated message
	 * @see YiiBase::t
	 */
	public function t($message, $params = array())
	{
		if($this->tCatchExceptions)
		{
			try 
			{
				return Yii::t($this->tCategory, $message, $params, $this->tSource, $this->tLanguage);
			}
			catch(Exception $e)
			{
				return $message;
			}
		}
		return Yii::t($this->tCategory, $message, $params, $this->tSource, $this->tLanguage);
	}
	
}