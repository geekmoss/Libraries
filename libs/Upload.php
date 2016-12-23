<?php

/**
 * Třída pro nahrávání souborů libovolného typu
 *
 * Prozatím nepodporovaný multiupload
 */
class Upload {

    private $fileHandle;

    /**
     * @param string $inputName Název formulářového vstupu
     */
    public function __construct($inputName) {
        $this->fileHandle = (object)$_FILES[$inputName];
    }

    /**
     * Metoda pro zjištění zda-li nahraný soubor je v pořádku.
     *
     * @return bool
     */
    public function isOk() {
        if ($this->fileHandle->error == UPLOAD_ERR_OK AND filesize($this->fileHandle->tmp_name) == $this->fileHandle->size) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Vrací koncovku nahraného souboru (bez tečky).
     *
     * @return mixed
     */
    public function getExtension() {
        return pathinfo($this->fileHandle->name, PATHINFO_EXTENSION);
    }

    /**
     * Vrací MIME typ souboru.
     *
     * @return mixed
     */
    public function getType() {
        return $this->fileHandle->type;
    }

    /**
     * Vrací název souboru (s koncovkou).
     *
     * @return mixed
     */
    public function getName() {
        return $this->fileHandle->name;
    }

    /**
     * Vrací velikost souboru v bytech
     *
     * @return mixed
     */
    public function getSize() {
        return $this->fileHandle->size;
    }

    /**
     * Metoda uloží nahraný soubor do vybraného adresáře pod zadaným názvem, vrací true při úspěchu.
     *
     *
     * @param string $where Cesta kam se soubor uloží s novým názvem
     * @return bool
     */
    public function saveUploadedFile($where) {
        return move_uploaded_file($this->fileHandle->tmp_name, $where);
    }
}