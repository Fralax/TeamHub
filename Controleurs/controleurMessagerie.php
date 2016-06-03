<?php

  require_once 'Modeles/utilisateurs.php';
  require_once 'Modeles/messagerie.php';
  require_once 'Vues/vue.php';

  class controleurMessagerie{

    public function affichageMessagerie(){
      $messagerie = new messagerie();
      $conversations = $messagerie->recupConversation($_SESSION['pseudo'])->fetchAll();

      $vue = new Vue('Messagerie');
      $vue->generer(array('conversations' => $conversations));
    }

    public function affichageNouvelleConversation(){
      $messagerie = new messagerie();
      $destinataires = $messagerie->recupDestinatairesPossibles()->fetchAll();
      $conversation = $messagerie->recupConversation($_SESSION['pseudo'])->fetch();
      $date = date('Y-m-d H:i:s');

      if (isset($_POST['envoyer'])) {
        if($_POST['destinataire'] != "" && $_POST['message'] != " "){
          if (($conversation[0] == $_SESSION['pseudo'] && $conversation[1] == $_POST['destinataire']) || ($conversation[1] == $_SESSION['pseudo'] && $conversation[0] == $_POST['destinataire'])) {
            $envoyerMessage = $messagerie->envoyerMessage($_SESSION['pseudo'], $_POST['destinataire'], $date, $_POST['message']);
            header("Location: index.php?page=conversation&correspondantA=".$_SESSION['pseudo']."&correspondantB=".$_POST['destinataire']);
          } else{
            $envoyerMessage = $messagerie->envoyerMessage($_SESSION['pseudo'], $_POST['destinataire'], $date, $_POST['message']);
            $nouvelleConversation = $messagerie->nouvelleConversation($_SESSION['pseudo'], $_POST['destinataire']);
            header("Location: index.php?page=conversation&correspondantA=".$_SESSION['pseudo']."&correspondantB=".$_POST['destinataire']);
          }

        } else{
          if($_COOKIE['langue'] == "English"){
            ?> <script> alert("Some fields have not been filled !")</script> <?php
          } else {
            ?> <script> alert("Des champs n'ont pas été rempli !")</script> <?php
          }
        }
      }

      $vue = new Vue('NouvelleConversation');
      $vue->generer(array('destinataires' => $destinataires));
    }

    public function affichageDetailsConversation($correspondantA, $correspondantB){
      $messagerie = new messagerie();

      if (isset($_POST['message'])) {
        if (!empty($_POST['message'])) {
          $message = $_POST['message'];
          $date = date('Y-m-d H:i:s');
          $envoiReponse = $messagerie->repondreConversation($message, $_SESSION['pseudo'], $_GET['correspondantB'], $date);
        }
      }

      $conversations = $messagerie->recupDetailsConversation($correspondantA, $correspondantB)->fetchAll();

      $vue = new Vue('Conversation');
      $vue->generer(array('messages' => $conversations, 'dernierID' => $dernierID, 'derniersMessages' => $recupNouveauxMessages, 'nouveauxMessages' => $nouveauxMessages));
    }

    public function nouveauxMessages(){
      $messagerie = new messagerie();

      $id = (int) $_GET['id'];
      $nouveauxMessages = $messagerie->recupNouveauxMessages($id, $_SESSION['pseudo'], $_GET['correspondantB'])->fetchAll();

      foreach ($nouveauxMessages as list($id, $expediteur, $destinataire, $date, $message)) {

        if ($destinataire == $_SESSION['pseudo']) {
          echo "<tr id = ".$id."> <td class='pseudoAmi'> <div class='pseudoAmiDiv'>".$_GET['correspondantB']."</div></td><td class='messageConversationAmi'><div class='messageConversationAmiDiv'>".$message."</div></td><td></td></tr>";
        } else{
          echo "<tr id = ".$id."> <td> </td><td class='messageConversationSessionPseudo'><div class='messageConversationSessionPseudoDiv'>".$message."</div></td><td class='monPseudo'><div class='monPseudoDiv'>".$_SESSION['pseudo']."</div></td></tr>";
        }
      }

    }



  }





?>
