# MySQL Patterns and Query Optimization

This folder contains best practices, patterns, and examples for optimizing MySQL queries. These techniques focus on improving performance, avoiding common pitfalls like N+1 issues, and ensuring more efficient and maintainable code.


## What's Included

- Raw SQL patterns (INNER JOIN, anti-joins, subqueries, JSON joins)
- PHP PDO connector class
- PHP examples running queries
- PHPUnit-ready composer setup

## How to Use

1. Clone the repo
2. Configure your database credentials in `src/Database.php`
3. Install dependencies:
   ```bash
   composer install
   ```
4. php examples/InnerJoinExample.php
5. composer test

## Table of Contents

1. [Inner Joins](#1-inner-joins)
2. [Eliminating N+1 Query Problem](#2-eliminating-n1-query-problem)
3. [DISTINCT for Removing Duplicates](#3-distinct-for-removing-duplicates)
4. [Using GROUP BY with Aggregate Functions](#4-using-group-by-with-aggregate-functions)
5. [Subqueries](#5-subqueries)
6. [Using JOIN vs WHERE for Efficient Filtering](#6-using-join-vs-where-for-efficient-filtering)
7. [Query Optimization Tips](#7-query-optimization-tips)

---

## 1. Inner Joins

**Purpose**: Use `INNER JOIN` to combine rows from two or more tables based on a related column.

### Best Practices

- Ensure foreign keys are properly indexed.
- Use aliases for readability.
- Be careful joining large tables without WHERE filters (can cause performance issues).
- Prefer explicit JOIN syntax over old-style joins in WHERE clause for clarity.


### Sample Topics
- Basic INNER JOIN
- INNER JOIN with multiple conditions
- INNER JOIN across three or more tables
- INNER JOIN with aggregation (COUNT, SUM)
- Using table aliases for cleaner queries

### Example:

```sql
-- Select products and their associated categories
SELECT p.name, c.category_name
FROM products p
INNER JOIN categories c ON p.category_id = c.id;
```

#### Key Points:

- Returns only records with matching values in both tables.
- Often used to fetch related data across multiple tables.
- Helps eliminate redundancy by normalizing the database.

### Advanced INNER JOIN Techniques

- INNER JOIN + Subqueries (e.g., latest orders, filtered results)
- INNER JOIN on JSON fields (MySQL 5.7+)
- LEFT JOIN + COALESCE for optional data
- INNER JOIN combined with NOT EXISTS for missing records
- Aggregated JOINs using GROUP BY and HAVING

## 2. Eliminating N+1 Query Problem
Purpose: Eliminate the N+1 problem, which occurs when querying related data inside a loop, triggering multiple queries unnecessarily.

Without Optimization (N+1 issue):

```
$posts = Post::all();

foreach ($posts as $post) {
    echo $post->author->name; // Each iteration triggers a query to get the author
}
```

Optimized Solution with Eager Loading:

```
$posts = Post::with('author')->get();

foreach ($posts as $post) {
    echo $post->author->name; // Only two queries, one for posts and one for authors
}
```

#### Key Points:

Use eager loading (with()) to load all related data in a single query, reducing unnecessary database hits.

This pattern is particularly useful in Laravel.

## 3. DISTINCT for Removing Duplicates
Purpose: Use DISTINCT to remove duplicate rows from your query results.

### Example:
```sql
-- Retrieve distinct author names from the posts table
SELECT DISTINCT author_name FROM posts;
```

#### Key Points:

DISTINCT eliminates duplicate rows based on the columns specified in the SELECT statement.

Useful when you need unique values from a column across many rows.

## 4. Using GROUP BY with Aggregate Functions
Purpose: Use GROUP BY to group data and aggregate it with functions like COUNT(), SUM(), or AVG().

### Example:
```sql
-- Get the total number of posts per author
SELECT author_name, COUNT(*) AS post_count
FROM posts
GROUP BY author_name;
```

#### Key Points:

GROUP BY is powerful when you want to summarize data, e.g., total sales per month, number of posts per author, etc.

Always use aggregation functions like COUNT(), SUM(), AVG(), etc., when applying GROUP BY.

## 5. Subqueries
Purpose: Use subqueries to simplify complex queries and isolate conditions.

### Example:
```sql
-- Get posts written by authors who have more than 5 posts
SELECT * FROM posts WHERE author_id IN (
    SELECT author_id FROM posts GROUP BY author_id HAVING COUNT(*) > 5
);
```
#### Key Points:

Subqueries can be used to filter results based on aggregated conditions.

They make it easier to break down complex queries and improve readability.

## 6. Using JOIN vs WHERE for Efficient Filtering
Purpose: Use JOIN when combining data from multiple tables, rather than relying on WHERE clauses to filter relationships.

Example with JOIN:
```sql
-- Join posts and orders to get the product names and order dates
SELECT p.name, o.order_date 
FROM products p
JOIN orders o ON p.id = o.product_id;
```
#### Key Points:

Avoid filtering relationships in the WHERE clause when combining data from multiple tables.

Use JOIN for more efficient querying and clearer logic.

## 7. Query Optimization Tips
- Here are some additional tips for optimizing your queries:

- Indexing: Always create indexes on columns used frequently in JOIN, WHERE, ORDER BY, and GROUP BY clauses to speed up query performance.

- *Avoid SELECT : Specify only the columns you need to reduce the amount of data transferred from the database.

- Limit Results: Use LIMIT when testing or debugging queries to avoid pulling large datasets unnecessarily.

- Analyze Query Performance: Use tools like EXPLAIN in MySQL to analyze and optimize your queries.

## Conclusion
These MySQL patterns are essential for optimizing queries and improving the performance of your applications. Whether you're working with large datasets or building complex relationships, following these patterns will help ensure your queries are efficient, easy to maintain, and scalable.