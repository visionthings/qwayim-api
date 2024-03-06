<?php

namespace App\View\Components\Dashboard;

use App\Models\Message;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * Create a new component instance.
     */
    public $messagesCount;

    public function __construct(public $title)
    {
        $this->title = config('app.name') . ' | ' . $title;
        $this->messagesCount = Message::count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.layout');
    }
}
