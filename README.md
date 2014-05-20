A Yii behavior that simplifies translating application component messages
==========================================================================================

This is a behavior to simplify translating application component messages by specifying a default category, source, and language
Optionally exceptions thrown during a translation can be caught and the original, untranslated, message returned if desired.

I created this behavior because I found myself often needing to use a particular category, message source, or language throughout a particular component.
The default Yii implementation for translating messages can be quite clunky by generating a lot of unecessary code in this situation.
This behavior attempts to solve this problem.

Just attach this behavior to your component and optionally specifying each of the translation parameters category, source, language.
Then call the method "t" on your component and your message will be translated using the properties specified by this component.
You may also optionally allow exceptions thrown during translations to be caught and the original message returned instead.