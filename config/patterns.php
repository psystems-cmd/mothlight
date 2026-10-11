<?php

/*
 * Design branch: generated with Claude (AI).
 *
 * Patterns only have a name in the database, so their colour and their short
 * meaning live here instead. Keyed by pattern name. A pattern that is not
 * listed still works: it falls back to a colour picked from its id and simply
 * shows no meaning text.
 */

return [

    // The accent colours a pattern can take, as name => hex.
    'accents' => [
        'lamp'  => '#FFC861',
        'ember' => '#F0783C',
        'haze'  => '#B8A6E3',
        'moss'  => '#8FD4A8',
        'rose'  => '#F58BA6',
        'tide'  => '#7FBEF0',
        'iris'  => '#A78BFA',
        'bone'  => '#E8D9BE',
    ],

    // name => [accent, meaning]
    'meanings' => [
        'Falling' => [
            'accent' => 'tide',
            'text' => 'The floor goes. Usually arrives in the first minutes of sleep, and usually wakes you before you land.',
        ],
        'Being chased' => [
            'accent' => 'ember',
            'text' => 'Something behind you, gaining. Dreamers often report it in weeks with a conversation they are putting off.',
        ],
        'Teeth falling out' => [
            'accent' => 'bone',
            'text' => 'They come loose one at a time, politely, into your hand. One of the oldest recorded dream patterns.',
        ],
        'Flying' => [
            'accent' => 'lamp',
            'text' => 'Sometimes effortless, sometimes a swim through thick air that drops you the moment you doubt it.',
        ],
        'Being naked in public' => [
            'accent' => 'rose',
            'text' => 'Nobody in the dream seems to mind, which is somehow the worst part.',
        ],
        'Late for an exam' => [
            'accent' => 'iris',
            'text' => 'A hall you cannot find, a subject you never took. Common long after anyone stops sitting exams.',
        ],
        'Lost in a building' => [
            'accent' => 'haze',
            'text' => 'Corridors that loop, a floor that was not there before. The building is often almost your old school.',
        ],
        'Unable to move' => [
            'accent' => 'iris',
            'text' => 'Awake enough to see the room, asleep enough that nothing obeys you. Often overlaps with sleep paralysis.',
        ],
        'Drowning' => [
            'accent' => 'tide',
            'text' => 'Water that rises faster than you can climb. Some dreamers find they can breathe it after a while.',
        ],
        'Losing your phone' => [
            'accent' => 'moss',
            'text' => 'A modern pattern. The pocket is empty, and in the dream that feels like losing a limb.',
        ],
        'Missing a train' => [
            'accent' => 'ember',
            'text' => 'The doors close as you reach them. The timetable is never quite readable.',
        ],
        'Back at school' => [
            'accent' => 'haze',
            'text' => 'Same desk, same corridor smell, present-day you. The register still has your name in it.',
        ],
        'Meeting someone who died' => [
            'accent' => 'bone',
            'text' => 'They are entirely ordinary about it. Dreamers often wake up calm, then remember.',
        ],
        'Endless stairs' => [
            'accent' => 'iris',
            'text' => 'Flights that arrive back where they started. Close cousin of the corridor that loops.',
        ],
        "Can't find a toilet" => [
            'accent' => 'moss',
            'text' => 'Every door opens onto the wrong room. Famously tends to arrive shortly before you wake up needing one.',
        ],
        'Car without brakes' => [
            'accent' => 'ember',
            'text' => 'The pedal goes to the floor and nothing answers. Often you are in the back seat.',
        ],
        'Being unable to scream' => [
            'accent' => 'rose',
            'text' => 'The breath is there, the sound is not. Frequently reported alongside being unable to move.',
        ],
        'Ex shows up' => [
            'accent' => 'rose',
            'text' => 'Unannounced, mid-errand, acting as though nothing ended. Rarely about them.',
        ],
        'House with extra rooms' => [
            'accent' => 'lamp',
            'text' => 'Your own home, but with a wing you had forgotten. Dreamers describe it as a discovery rather than a fright.',
        ],
        'Animals talking' => [
            'accent' => 'moss',
            'text' => 'Usually calm, usually advice. The dreamer almost never finds it strange until afterwards.',
        ],
        'Natural disaster' => [
            'accent' => 'ember',
            'text' => 'A wave, a sky going wrong. Often watched from a window rather than fled.',
        ],
        'Being pregnant' => [
            'accent' => 'rose',
            'text' => 'Reported by dreamers of every description. Often tied to something unfinished rather than to a child.',
        ],
        'Lucid dreaming' => [
            'accent' => 'lamp',
            'text' => 'The moment you notice. Light switches, hands and mirrors are what usually give it away.',
        ],
        'Forgetting how to read' => [
            'accent' => 'bone',
            'text' => 'The letters are all present and mean nothing. Text in dreams rarely holds still long enough to be read.',
        ],
        'Hiding from someone' => [
            'accent' => 'haze',
            'text' => 'Behind a door that will not lock, holding your breath. You seldom learn who it was.',
        ],
    ],
];
