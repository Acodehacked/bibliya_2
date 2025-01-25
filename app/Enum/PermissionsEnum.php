<?php

namespace App\Enum;

enum PermissionsEnum: string
{
    case EditQuestions = 'edit_questions';
    case EditVerses = 'edit_verses';
    case ManageQuiz = 'manage_quizzes';
    case ManageFeatures = 'manage_features';
    case ManageAdmins = 'manage_admins';
    case ManageOwnVideos = 'manage_own_videos';
    case ManageAllVideos = 'manage_all_videos';
}
