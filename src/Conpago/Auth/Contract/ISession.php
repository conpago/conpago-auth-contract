<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Gołek
 * Date: 09.11.13
 * Time: 15:30
 *
 * @package    Conpago-Auth-Contract
 * @subpackage Base
 * @author     Bartosz Gołek <bartosz.golek@gmail.com>
 * @copyright  Copyright (c) 2015, Bartosz Gołek
 */

namespace Conpago\Auth\Contract;

/**
 * Provides object oriented access to PHP sessions.
 */
interface ISession
{

    /**
     * Destroys all data registered to a session.
     * Wrapper for PHP session_destroy() function.
     *
     * @return boolean Returns TRUE on success or FALSE on failure.
     */
    public function destroy(): bool;

    /**
     * Get the current session id.
     * Wrapper for PHP session_id() function.
     *
     * @return string Returns the session id for the current session or
     * the empty string ("") if there is no current session (no current session id exists).
     */
    public function getId(): string;

    /**
     * Set the current session id.
     * Wrapper for PHP session_id() function.
     *
     * @param string $sessionId Id to replace the current session id.
     *
     * @return void
     */
    public function setId(string $sessionId): void;

    /**
     * Get the current session name.
     * Wrapper for PHP session_name() function.
     *
     * @return string Returns the name of the current session.
     */
    public function getName(): string;

    /**
     * Set the current session name.
     * Wrapper for PHP session_name() function.
     *
     * @param string $name The session name references the name of the session, which is used in
     * cookies and URLs (e.g. PHPSESSID).
     *
     * @return void
     */
    public function setName(string $name): void;

    /**
     * Update the current session id with a newly generated one.
     * Wrapper for PHP session_regenerate_id(false) function.
     *
     * @return boolean Returns TRUE on success or FALSE on failure.
     */
    public function regenerateId(): bool;

    /**
     * Update the current session id with a newly generated one and delete old associated session file.
     * Wrapper for PHP session_regenerate_id(true) function.
     *
     * @return boolean Returns TRUE on success or FALSE on failure.
     */
    public function regenerateIdAndRemoveOldSession(): bool;

    /**
     * Get the current session save path.
     * Wrapper for PHP session_save_path() function.
     *
     * @return string Returns the path of the current directory used for data storage.
     */
    public function getSavePath(): string;

    /**
     * Set the current session save path.
     * Wrapper for PHP session_save_path() function.
     *
     * @param string $path Session data path. If specified, the path to which data is saved will be changed.
     * session_save_path() needs to be called before session_start() for that purpose.
     *
     * @return void
     */
    public function setSavePath(string $path): void;

    /**
     * Start new or resume existing session.
     * Wrapper for PHP session_start() function.
     *
     * @return boolean This function returns TRUE if a session was successfully started, otherwise FALSE.
     */
    public function start(): bool;

    /**
     * Returns the current session status
     * Wrapper for PHP session_status() function.
     *
     * @return integer Returns values:
     *  - PHP_SESSION_DISABLED if sessions are disabled.
     *  - PHP_SESSION_NONE if sessions are enabled, but none exists.
     *  - PHP_SESSION_ACTIVE if sessions are enabled, and one exists.
     */
    public function getStatus(): int;

    /**
     * Free all session variables.
     * Wrapper for PHP session_unset() function.
     *
     * @return void
     */
    public function release(): void;

    /**
     * Write session data and end session.
     * Wrapper for PHP session_write_close() function.
     *
     * @return void
     */
    public function writeClose(): void;

    /**
     * @param string $name  A string holding the name of a variable or an
     * array consisting of variable names or other arrays.
     * @param mixed  $value The value of a variable.
     *
     * @return void
     */
    public function register(string $name, $value): void;

    /**
     * Find out whether a global variable is registered in a session.
     * Wrapper for PHP session_is_registered() function.
     *
     * @param string $name The variable name.
     *
     * @return boolean Returns TRUE if there is a global variable with the name name registered in the current session,
     * FALSE otherwise.
     */
    public function isRegistered(string $name): bool;

    /**
     * Get value of global variable registered in the current session.
     *
     * @param string $name The variable name.
     *
     * @return mixed Returns value of a variable.
     */
    public function getValue(string $name);
}
