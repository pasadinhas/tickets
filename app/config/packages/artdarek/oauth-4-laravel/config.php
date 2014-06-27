<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(

		/**
		 * Facebook
		 */
        'Facebook' => array(
            'client_id'     => 'test',
            'client_secret' => '',
            'scope'         => array(),
        ),

        /**
         * FenixEdu
         */
        'FenixEdu' => array(
            'client_id'     => '7065221213123',
            'client_secret' => 'Coir1hh7LcvYfuAOUUj1sYrn9LxOULMDoh3PPv3IERsp5rR0oUInhnQnKEkqkuAoSvj5aMvJPKPggJLNzlwwUsR7c6TXsd3blq2zgr0Bji1FGDUYSUR',
        )

	)

);