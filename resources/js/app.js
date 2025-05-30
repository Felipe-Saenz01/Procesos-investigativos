import './bootstrap';
import './chart';

import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import Focus from '@alpinejs/focus'

Alpine.plugin(Focus)
Livewire.start()
