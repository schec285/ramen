<?php

if (! function_exists('scoreClass')) {
    function scoreClass(int $score): array
    {
        $map = [
            'perfect' => ['bg' => 'score--perfect-bg', 'text' => 'score--perfect-text'],
            'excellent'=> ['bg'=> 'score--excellent-bg','text'=> 'score--excellent-text'],
            'good' => ['bg' => 'score--good-bg', 'text' => 'score--good-text'],
            'medium' => ['bg' => 'score--medium-bg', 'text' => 'score--medium-text'],
            'fair' => ['bg' => 'score--fair-bg', 'text' => 'score--fair-text'],
            'poor' => ['bg' => 'score--poor-bg', 'text' => 'score--poor-text'],
        ];

        if ($score === 100) {
            return $map['perfect'];
        } elseif ($score >= 90) {
            return $map['excellent'];
        } elseif ($score >= 80) {
            return $map['good'];
        } elseif ($score >= 70) {
            return $map['medium'];
        } elseif ($score >= 50) {
            return $map['fair'];
        } else {
            return $map['poor'];
        }
    }
}
