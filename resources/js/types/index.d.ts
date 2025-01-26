import { Config } from 'ziggy-js';

export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at?: string;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        user: User;
    };
    ziggy: Config & { location: string };
};

export interface Publisher {
    id: number; // Primary key
    name: string; // Publisher name
    adress?: string; // Publisher name
    logo?: string; // Publisher name
    created_at: string; // Created at timestamp
    updated_at: string; // Updated at timestamp
}
export interface Question {
    id: number; // Primary key
    book?: Book; // Book object (nullable)
    book_id?: number; // Foreign key referencing books table (nullable)
    chapter?: number; // Chapter number (nullable)
    question_categories_id?: number; // Foreign key referencing question categories table (nullable)
    language: string; // Language of the question (e.g., Malayalam, English)
    question_text: string; // The actual question text
    options: Record<string, string>; // JSON object for options (e.g., {"A": "Option 1", "B": "Option 2"})
    correct_answer: string; // Correct answer key (e.g., "A")
    explanation?: string; // Explanation for the correct answer (nullable)
    difficulty_id?: number; // Foreign key referencing difficulties table (nullable)
    reference?: string; // Reference (nullable)
    is_active: boolean; // Determines if the question is active
    created_at: string; // Created at timestamp
    updated_at: string; // Updated at timestamp
}
export interface QuestionCategory { 
    id: number; // Primary key
    name: string; // Category name
    created_at: string; // Created at timestamp
    updated_at: string; // Updated at timestamp
}
export interface Difficulty {
    id: number; // Primary key
    name: string; // Difficulty name
    created_at: string; // Created at timestamp
    updated_at: string; // Updated at timestamp
}


export interface Book {
    id: number; // Primary key
    eng_name: string; // English name of the book
    mal_name?: string; // Malayalam name of the book (nullable)
    publisher?: Publisher; // Publisher name (nullable)
    max_chapters?: number; 
    questions?: Question[],// Maximum chapters (nullable)
    type: 'bible' | 'other';
    from: 'old_testament' | 'new_testament'| 'other', // Type of the book (e.g., "Bible", "Other")
    image?: string; // Image URL (nullable)
    created_at: string; // Created at timestamp
    updated_at: string; // Updated at timestamp
  }
  