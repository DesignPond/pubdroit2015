<?php namespace Droit\Colloque\Commands;

use Laracasts\Commander\CommandHandler;
use Droit\Colloque\Worker\DocumentInterface;
use Droit\Colloque\Repo\InscriptionInterface;

class GenerateDocumentCommandHandler implements CommandHandler {

    protected $document;

    protected $inscription;

    public function __construct(DocumentInterface $document, InscriptionInterface $inscription ){

        $this->document    = $document;

        $this->inscription = $inscription;
    }
    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {

        $inscription = $this->inscription->find($command->inscription_id);

        if( !$this->document->generateDocs($inscription) )
        {
            throw new \Droit\Exceptions\DocumentGeneratorException('Document generation failed', array('Problem with pdf inscription: '.$command->inscription_id ));
        }

        \Event::fire('Droit\Colloque\Events\DocumentWasGenerated', array($inscription));

        return $inscription;

    }

}