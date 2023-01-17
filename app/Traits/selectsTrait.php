<?php

namespace App\Traits;

use App\Models\Company;
use App\Models\Reminder;
use App\Models\ReminderStatus;

trait selectsTrait {

    public $companies, $reminderStatuses, $reminders;

    protected function loadCompanies()
    {
        $this->companies = Company::pluck('name', 'id');
    }
    protected function loadReminderStatuses()
    {
        $this->reminderStatuses = ReminderStatus::pluck('name', 'id');
    }
    protected function loadReminders()
    {
        $this->reminders = Reminder::get();
    }

}
