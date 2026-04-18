# SCHOLARIX ERD

```mermaid
erDiagram
    USERS ||--o{ APPLICATIONS : submits
    SCHOLARSHIPS ||--o{ APPLICATIONS : receives
    USERS ||--o{ SCHOLARSHIPS : creates

    USERS {
        bigint id PK
        string name
        string first_name
        string last_name
        string email
        string student_id
        string program
        enum role
        string password
        timestamps timestamps
    }

    SCHOLARSHIPS {
        bigint id PK
        string title
        string category
        text description
        longtext requirements
        decimal amount
        int slots
        date deadline
        enum status
        bigint created_by FK
        timestamps timestamps
    }

    APPLICATIONS {
        bigint id PK
        bigint user_id FK
        bigint scholarship_id FK
        enum status
        string remarks
        longtext personal_statement
        string document_path
        timestamp applied_at
        timestamp reviewed_at
        timestamps timestamps
    }
```

## Relationship summary

- One user can submit many applications.
- One scholarship can receive many applications.
- One admin user can create many scholarships.
- A user can only apply once per scholarship because of the unique constraint on `user_id` and `scholarship_id`.
