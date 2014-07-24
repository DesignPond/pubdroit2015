<?php 
/**
 * Repo Eloquent Class 
 */

namespace Droit\Admin\Repo;

use Droit\Admin\Repo\SearchInterface;
use Droit\User\Repo\UserInfoInterface;
use Droit\User\Repo\AdresseInterface;


/**
 * Implements SearchInterface 
 * Custom search by keywords in the database for user or adresse
 */

class SearchEloquent implements SearchInterface {

	/**
	 * Protected user model
	 */			
	protected $user;

	/**
	 * Protected address model
	 */	
	protected $adresse;

    /**
     * Protected user columns for search
     */
    protected $usersearch;

    /**
     * Protected address columns for search
     */
    protected $addresssearch;

	/**
	 * Class expects an Eloquent model
	 */	
	public function __construct(UserInfoInterface $user , AdresseInterface $adresse )
	{
		$this->user     = $user;
		
		$this->adresse  = $adresse;

        $this->cleaning = new \Cleaning();

        $this->usersearch    = \Config::get('common.usersearch');

        $this->addresssearch = \Config::get('common.addresssearch');

	}
	
	/**
	 * Find user by keywords
	 * Allow for htmlentities and accents
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function find($data){
		
		// background processing, special commands (backspace, etc.), quotes newlines, or some other special characters 
   		$matchSimple =  trim($data);
		$pattern     = '/(;|\||`|>|<|&|^|"|'."\n|\r|'".'|{|}|[|]|\)|\()/i'; 
		
		$matchSimple = preg_replace($pattern, '', $matchSimple);
		
		// We still have something to search for
		if( ($matchSimple != '') && (strlen($matchSimple) > 1) ){
			
			// We have to account for french accents and make two searches
			$matchAccent   = $matchSimple;
			$matchEntities = htmlentities($matchSimple, ENT_QUOTES, 'UTF-8');
			
			// In case of multiple words
			$s1 = explode(" ", $matchAccent);
			$s2 = explode(" ", $matchEntities);
			
			// Trim extra blank spaces
			$s1 = array_filter(array_map('trim',$s1));
			$s2 = array_filter(array_map('trim',$s2));

			// Query construction
			$fields = 'id , deleted , civilite , nom  , prenom , profession , entreprise , telephone , adresse , complement , cp , npa , ville , pays , canton , email';
				   
			$select = 'SELECT '.$fields.' '; 		
			$from   = 'FROM adresses WHERE ';
			
			$sqlSearch1 = '';
			$sqlSearch2 = '';
			
			if(count($s1) == 1)
			{
				$sqlSearch1 .= ' ( nom LIKE "%'.$s1[0].'%" OR prenom LIKE "%'.$s1[0].'%" ) ';
				$sqlSearch1 .= ' OR entreprise LIKE "%'.$s1[0].'%" ';
				$sqlSearch1 .= ' OR email      LIKE "%'.$s1[0].'%" ';
				
				$sqlSearch2  = '  ( nom LIKE "%'.$s2[0].'%" OR prenom LIKE "%'.$s2[0].'%" ) ';
				$sqlSearch2 .= ' OR entreprise LIKE "%'.$s2[0].'%" ';
				$sqlSearch2 .= ' OR email      LIKE "%'.$s2[0].'%"';
			}
						
			if(count($s1) >= 2)
			{				
				$sqlSearch1 .= '    ( prenom   LIKE "%'.$s1[0].'%" AND nom    LIKE "%'.$s1[1].'%" ) ';
				$sqlSearch1 .= ' OR ( nom      LIKE "%'.$s1[0].'%" AND prenom LIKE "%'.$s1[1].'%" ) ';
				$sqlSearch1 .= ' OR entreprise LIKE "%'.$s1[0].' '.$s1[1].'%" ';
				$sqlSearch1 .= ' OR email LIKE "%'.$s1[0].'.'.$s1[1].'%" ';
				$sqlSearch1 .= ' OR email LIKE "%'.$s1[1].'.'.$s1[0].'%" ';
				$sqlSearch1 .= ' OR prenom     LIKE "%'.$matchAccent.'%" ';
				$sqlSearch1 .= ' OR nom        LIKE "%'.$matchAccent.'%" ';
				$sqlSearch1 .= ' OR entreprise LIKE "%'.$matchAccent.'%" ';
				$sqlSearch1 .= ' OR email      LIKE "%'.$matchAccent.'%" ';
				
				$sqlSearch2  = '    ( nom      LIKE "%'.$s2[0].'%"  AND prenom LIKE "%'.$s2[1].'%" ) ';
				$sqlSearch2 .= ' OR ( prenom   LIKE "%'.$s2[0].'%"  AND nom    LIKE "%'.$s2[1].'%" ) ';
				$sqlSearch2 .= ' OR entreprise LIKE "%'.$s2[0].' '.$s2[1].'%"';
				$sqlSearch2 .= ' OR email LIKE "%'.$s2[0].'.'.$s2[1].'%" ';
				$sqlSearch2 .= ' OR email LIKE "%'.$s2[1].'.'.$s2[0].'%" ';
				$sqlSearch2 .= ' OR prenom     LIKE "%'.$matchEntities.'%" ';
				$sqlSearch2 .= ' OR nom        LIKE "%'.$matchEntities.'%" ';
				$sqlSearch2 .= ' OR entreprise LIKE "%'.$matchEntities.'%" ';
				$sqlSearch2 .= ' OR email      LIKE "%'.$matchEntities.'%" ';
				
			}
			
			// Build UNION query
			$startQuery = 'SELECT * FROM  (' ;
			$query1     = '('.$select.$from.$sqlSearch1.')';
			$union      = ' UNION ';
			$query2     = '('.$select.$from.$sqlSearch2.')';
			
			$endQuery   = ' ) tmp '; 
			$endQuery  .= ' WHERE tmp.deleted = "0" AND tmp.user_id = "0" '; 
			$endQuery  .= ' GROUP BY tmp.id ORDER BY tmp.nom, tmp.prenom ASC ';
			
			$results = \DB::select( $startQuery.$query1.$union.$query2.$endQuery );
	
			return $results;
			
		}
		
		return NULL;
	}

	/**
	 * Find adresse by keywords
	 * Allow for htmlentities and accents
	 * @return Illuminate\Database\Eloquent\Collection
	 */	
	public function findAdresse($data){
		
		// background processing, special commands (backspace, etc.), quotes newlines, or some other special characters 
   		$matchSimple =  trim($data);
		$pattern     = '/(;|\||`|>|<|&|^|"|'."\n|\r|'".'|{|}|[|]|\)|\()/i'; 
		
		$matchSimple = preg_replace($pattern, '', $matchSimple);
		
		// We still have something to search for
		if( ($matchSimple != '') && (strlen($matchSimple) > 1) ){
			
			// We have to account for french accents and make two searches
			$matchAccent   = $matchSimple;
			$matchEntities = htmlentities($matchSimple, ENT_QUOTES, 'UTF-8');
			
			// In case of multiple words
			$s1 = explode(" ", $matchAccent);
			$s2 = explode(" ", $matchEntities);
			
			// Trim extra blank spaces
			$s1 = array_filter(array_map('trim',$s1));
			$s2 = array_filter(array_map('trim',$s2));
				   	
			$from   = 'adresses';
			// Query construction
			$fields = array(
				$from.'.id' ,$from.'.user_id',$from.'.deleted',$from.'.civilite',$from.'.nom',$from.'.prenom',
				$from.'.profession',$from.'.entreprise',$from.'.telephone',$from.'.adresse',$from.'.complement',
				$from.'.cp',$from.'.npa',$from.'.ville',$from.'.pays',$from.'.canton',$from.'.email'
			);
			
			$sqlSearch1 = '';
			$sqlSearch2 = '';
			
			if(count($s1) == 1)
			{
				$sqlSearch1 .= ' ( '.$from.'.nom LIKE "%'.$s1[0].'%" OR '.$from.'.prenom LIKE "%'.$s1[0].'%" ) ';
				$sqlSearch1 .= ' OR '.$from.'.entreprise LIKE "%'.$s1[0].'%" ';
				$sqlSearch1 .= ' OR '.$from.'.email      LIKE "%'.$s1[0].'%" ';
				
				$sqlSearch2  = '  ( '.$from.'.nom LIKE "%'.$s2[0].'%" OR '.$from.'.prenom LIKE "%'.$s2[0].'%" ) ';
				$sqlSearch2 .= ' OR '.$from.'.entreprise LIKE "%'.$s2[0].'%" ';
				$sqlSearch2 .= ' OR '.$from.'.email      LIKE "%'.$s2[0].'%"';
			}
						
			if(count($s1) >= 2)
			{				
				$sqlSearch1 .= '    ( '.$from.'.prenom   LIKE "%'.$s1[0].'%" AND '.$from.'.nom    LIKE "%'.$s1[1].'%" ) ';
				$sqlSearch1 .= ' OR ( '.$from.'.nom      LIKE "%'.$s1[0].'%" AND '.$from.'.prenom LIKE "%'.$s1[1].'%" ) ';
				$sqlSearch1 .= ' OR '.$from.'.entreprise LIKE "%'.$s1[0].' '.$s1[1].'%" ';
				$sqlSearch1 .= ' OR '.$from.'.email LIKE "%'.$s1[0].'.'.$s1[1].'%" ';
				$sqlSearch1 .= ' OR '.$from.'.email LIKE "%'.$s1[1].'.'.$s1[0].'%" ';
				$sqlSearch1 .= ' OR '.$from.'.prenom     LIKE "%'.$matchAccent.'%" ';
				$sqlSearch1 .= ' OR '.$from.'.nom        LIKE "%'.$matchAccent.'%" ';
				$sqlSearch1 .= ' OR '.$from.'.entreprise LIKE "%'.$matchAccent.'%" ';
				$sqlSearch1 .= ' OR '.$from.'.email      LIKE "%'.$matchAccent.'%" ';
				
				$sqlSearch2  = '    ( '.$from.'.nom      LIKE "%'.$s2[0].'%"  AND '.$from.'.prenom LIKE "%'.$s2[1].'%" ) ';
				$sqlSearch2 .= ' OR ( '.$from.'.prenom   LIKE "%'.$s2[0].'%"  AND '.$from.'.nom    LIKE "%'.$s2[1].'%" ) ';
				$sqlSearch2 .= ' OR '.$from.'.entreprise LIKE "%'.$s2[0].' '.$s2[1].'%"';
				$sqlSearch2 .= ' OR '.$from.'.email LIKE "%'.$s2[0].'.'.$s2[1].'%" ';
				$sqlSearch2 .= ' OR '.$from.'.email LIKE "%'.$s2[1].'.'.$s2[0].'%" ';
				$sqlSearch2 .= ' OR '.$from.'.prenom     LIKE "%'.$matchEntities.'%" ';
				$sqlSearch2 .= ' OR '.$from.'.nom        LIKE "%'.$matchEntities.'%" ';
				$sqlSearch2 .= ' OR '.$from.'.entreprise LIKE "%'.$matchEntities.'%" ';
				$sqlSearch2 .= ' OR '.$from.'.email      LIKE "%'.$matchEntities.'%" ';
				
			}

			$first = \DB::table($from)->whereRaw('( '.$sqlSearch1.' ) AND '.$from.'.user_id = 0' )
									  ->select($fields)
									  ->groupBy($from.'.id')
									  ->orderBy($from.'.nom, '.$from.'.prenom', 'asc');

			$users = \DB::table($from)->whereRaw('( '.$sqlSearch2.' ) AND '.$from.'.user_id = 0' )								  
									  ->select($fields)
									  ->groupBy($from.'.id')
									  ->orderBy($from.'.nom, '.$from.'.prenom', 'asc')
									  ->union($first)
									  ->get();
			
			return $users;
		
		}
		
		return NULL;
	}
	
	/**
	 * Find user by keywords
	 * Allow for htmlentities and accents
	 * @return Illuminate\Database\Eloquent\Collection
	 */	
	public function findUser($data){
		
		
		// background processing, special commands (backspace, etc.), quotes newlines, or some other special characters 
   		$matchSimple =  trim($data);
		$pattern     = '/(;|\||`|>|<|&|^|"|'."\n|\r|'".'|{|}|[|]|\)|\()/i'; 
		
		$matchSimple = preg_replace($pattern, '', $matchSimple);
		
		// We still have something to search for
		if( ($matchSimple != '') && (strlen($matchSimple) > 1) ){
			
			// We have to account for french accents and make two searches
			$matchAccent   = $matchSimple;
			$matchEntities = htmlentities($matchSimple, ENT_QUOTES, 'UTF-8');
			
			// In case of multiple words
			$s1 = explode(" ", $matchAccent);
			$s2 = explode(" ", $matchEntities);
			
			// Trim extra blank spaces
			$s1 = array_filter(array_map('trim',$s1));
			$s2 = array_filter(array_map('trim',$s2));
				   	
			$join   = 'adresses';
			$from   = 'users';
			
			// Query construction
			$fields = array(
				$join.'.id' ,$join.'.user_id',$join.'.deleted',$join.'.civilite',$join.'.nom',$join.'.prenom',
				$join.'.profession',$join.'.entreprise',$join.'.telephone',$join.'.adresse', $join.'.npa',$join.'.ville',
				$join.'.pays',$join.'.canton',$join.'.email', $from.'.nom as user_nom', 
				$from.'.prenom as user_prenom', $from.'.email as user_email', $from.'.activated as activated', $from.'.id as uid'
			);
			
			$sqlSearch1 = '';
			$sqlSearch2 = '';
			
			if(count($s1) == 1)
			{
				$sqlSearch1 .= '  ( '.$from.'.nom   LIKE "%'.$s1[0].'%" OR '.$from.'.prenom LIKE "%'.$s1[0].'%" ) ';
				$sqlSearch1 .= ' OR '.$from.'.email LIKE "%'.$s1[0].'%" ';
				
				$sqlSearch2  = '  ( '.$from.'.nom   LIKE "%'.$s2[0].'%" OR '.$from.'.prenom LIKE "%'.$s2[0].'%" ) ';
				$sqlSearch2 .= ' OR '.$from.'.email LIKE "%'.$s2[0].'%"';
			}
						
			if(count($s1) >= 2)
			{				
				$sqlSearch1 .= '  (  '.$from.'.prenom LIKE "%'.$s1[0].'%" AND '.$from.'.nom    LIKE "%'.$s1[1].'%" ) ';
				$sqlSearch1 .= ' OR ('.$from.'.nom    LIKE "%'.$s1[0].'%" AND '.$from.'.prenom LIKE "%'.$s1[1].'%" ) ';
				$sqlSearch1 .= ' OR  '.$from.'.email  LIKE "%'.$s1[0].'.'.$s1[1].'%" ';
				$sqlSearch1 .= ' OR  '.$from.'.email  LIKE "%'.$s1[1].'.'.$s1[0].'%" ';
				$sqlSearch1 .= ' OR  '.$from.'.prenom LIKE "%'.$matchAccent.'%" ';
				$sqlSearch1 .= ' OR  '.$from.'.nom    LIKE "%'.$matchAccent.'%" ';
				$sqlSearch1 .= ' OR  '.$from.'.email  LIKE "%'.$matchAccent.'%" ';
				
				$sqlSearch2  = '  (  '.$from.'.nom    LIKE "%'.$s2[0].'%"  AND '.$from.'.prenom LIKE "%'.$s2[1].'%" ) ';
				$sqlSearch2 .= ' OR ('.$from.'.prenom LIKE "%'.$s2[0].'%"  AND '.$from.'.nom    LIKE "%'.$s2[1].'%" ) ';
				$sqlSearch2 .= ' OR  '.$from.'.email  LIKE "%'.$s2[0].'.'.$s2[1].'%" ';
				$sqlSearch2 .= ' OR  '.$from.'.email  LIKE "%'.$s2[1].'.'.$s2[0].'%" ';
				$sqlSearch2 .= ' OR  '.$from.'.prenom LIKE "%'.$matchEntities.'%" ';
				$sqlSearch2 .= ' OR  '.$from.'.nom    LIKE "%'.$matchEntities.'%" ';
				$sqlSearch2 .= ' OR  '.$from.'.email  LIKE "%'.$matchEntities.'%" ';
				
			}

			$first = \DB::table($from)->whereRaw($sqlSearch1)
									  ->leftJoin($join, $from.'.id', '=', $join.'.user_id')
									  ->select($fields)
									  ->groupBy($from.'.id')
									  ->orderBy($from.'.nom, '.$from.'.prenom', 'asc');

			$users = \DB::table($from)->whereRaw($sqlSearch2)
									  ->select($fields)
									  ->leftJoin($join, $from.'.id', '=', $join.'.user_id')
									  ->groupBy($from.'.id')
									  ->orderBy($from.'.nom, '.$from.'.prenom', 'asc')
									  ->union($first)
									  ->get();
			
			return $users;
		
		}
		
		return NULL;	
	
	}


    /**
     * Find user by keywords
     * Allow for htmlentities and accents
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findUserNew($data){

        list($terms, $search) = $this->prepareSearch($data);

        // We still have something to search for
        if( strlen($terms) > 0 )
        {

            $join   = 'adresses';
            $from   = 'users';

            // Query construction
            $fields = array(
                $join.'.id' ,$join.'.user_id',$join.'.deleted',$join.'.civilite',$join.'.nom',$join.'.prenom',
                $join.'.profession',$join.'.entreprise',$join.'.telephone',$join.'.adresse', $join.'.npa',$join.'.ville',
                $join.'.pays',$join.'.canton',$join.'.email', $from.'.nom as user_nom',
                $from.'.prenom as user_prenom', $from.'.email as user_email', $from.'.activated as activated', $from.'.id as uid'
            );

            $sql  = ' '.$from.'.name LIKE "%'.$terms.'%" ';
            $sql .= ' OR '.$from.'.email LIKE "%'.$terms.'%" ';

            $users = \DB::table($from)->whereRaw($sql)
                ->leftJoin($join, $from.'.id', '=', $join.'.user_id')
                ->select($fields)
                ->groupBy($from.'.id')
                ->orderBy($from.'.nom', 'asc')
                ->orderBy($from.'.prenom', 'asc')
                ->get();

            return $users;

        }

        return NULL;

    }

    /**
     * Find user by keywords
     * Allow for htmlentities and accents
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findAdresseNew($data){

        list($terms, $search) = $this->prepareSearch($data);

        // We still have something to search for
        if( strlen($terms) > 0 )
        {

            $from   = 'adresses';

            // Query construction
            $fields = array(
                $from.'.id' ,$from.'.user_id',$from.'.deleted',$from.'.civilite',$from.'.nom',$from.'.prenom',
                $from.'.profession',$from.'.entreprise',$from.'.telephone',$from.'.adresse', $from.'.npa',$from.'.ville',
                $from.'.pays',$from.'.canton',$from.'.email', $from.'.nom as user_nom'
            );

            $sql  = ' '.$from.'.name LIKE "%'.$terms.'%" ';
            $sql .= ' OR '.$from.'.email LIKE "%'.$terms.'%" ';
            $sql .= ' OR '.$from.'.entreprise LIKE "%'.$terms.'%" ';

            $adresses = \DB::table($from)->whereRaw($sql)
                                      ->select($fields)
                                      ->groupBy($from.'.id')
                                      ->orderBy($from.'.nom', 'asc')
                                      ->orderBy($from.'.prenom', 'asc')
                                      ->get();

            return $adresses;

        }

        return NULL;

    }

	/**
	 * Find by multiple filters
	 * - Cantons
	 * - Specialisations
	 * - Membres
	 * @return collection
	 */		
	public function triage($filters){
	
		$filters = array(
			'canton'         => array( '6' , '11' , '13'),
			'specialisation' => array( '1' , '4' ),
			'membre'         => array( '1' , '2' , '4' )
		);
		
		// ( SELECT * FROM user_membres WHERE membre IN (1,2,4) ) AS membre
		
		$query  = 'SELECT adresses.id , adresses.prenom , adresses.nom ,adresses.canton  FROM adresses ';

		foreach($filters['membre'] as $membre){
			
			$query .= 'INNER JOIN ( SELECT * FROM user_membres WHERE membre = '.$membre.' ) AS membre'.$membre.' ON adresses.id = membre'.$membre.'.adresse_id ';
			
		}	       
		
		// $query .= 'INNER JOIN ( SELECT * FROM user_specialisations WHERE specialisation IN (1) ) AS specialisation ON adresses.id = specialisation.adresse_id ';
		
		$query .= ' WHERE adresses.canton = 13';	       
		$query .= ' GROUP BY adresses.id';
			      
		// $results = \DB::select( $query );
	
		return $query;

	}

    /**
     * Prepare search string for databass
     * @return array
     */
    public function prepareSearch($string){

        // Trim whitespace
        $terms   =  trim($string);

        // Sanitize
        $terms   = $this->cleaning->sanitize($terms);

        // background processing, special commands (backspace, etc.), quotes newlines, or some other special characters
        $pattern = '/(;|\||`|>|<|&|^|"|'."\n|\r|'".'|{|}|[|]|\)|\()/i';
        $terms   = preg_replace($pattern, '', $terms);

        // Remove antislashes
        $terms = stripslashes($terms);

        // Remove blank spaces
        $terms = preg_replace('/\s+/', ' ', $terms);

        // Explode all words into array
        $search = explode(" ", $terms);

        return array($terms , $search);

    }
	
}