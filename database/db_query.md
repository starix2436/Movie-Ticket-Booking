CREATE TABLE movie_30 (
  m_id INT PRIMARY KEY,
  m_name VARCHAR(100),
  m_rating INT,
  m_len INT,
  m_genre VARCHAR(255),
  m_img VARCHAR(255)
);
INSERT INTO movie (m_id, m_name, m_rating, m_len, m_genre, m_img)
VALUES (
    1,
    'Inception(2010)',
    8.8,
    148,
    'Action Adventure Sci-Fi',
    'https://www.imdb.com/title/tt1375666/mediaviewer/rm3426651392/?ref_=tt_ov_i'
  ),
  (
    2,
    '12 Angry Men(1957)',
    9.0,
    96,
    'Crime Drama',
    'https://www.imdb.com/title/tt0050083/mediaviewer/rm2927108352/?ref_=tt_ov_i'
  ),
  (
    3,
    'Life Is Beautiful(1997)',
    8.6,
    116,
    'Comedy Drama Romance',
    'https://www.imdb.com/title/tt0118799/mediaviewer/rm2303464448/?ref_=tt_ov_i'
  ),
  (
    4,
    'Lost Highway(1997)',
    7.6,
    134,
    'Mystery Thriller',
    'https://www.imdb.com/title/tt0116922/mediaviewer/rm3025737728/?ref_=tt_ov_i'
  ),
  (
    5,
    'The Dark Knight Rises(2012)',
    8.4,
    164,
    'Action Crime Drama',
    'https://www.imdb.com/title/tt1345836/mediaviewer/rm834516224/?ref_=tt_ov_i'
  ),
  (
    6,
    '3 Idiots(2009)',
    8.948,
    170,
    'Comedy Drama',
    'https://www.imdb.com/title/tt1187043/mediaviewer/rm2029391104/?ref_=tt_ov_i'
  ),
  (
    7,
    'Fight Club(1999)',
    8.8,
    139,
    'Drama',
    'https://www.imdb.com/title/tt0137523/mediaviewer/rm1412004864/?ref_=tt_ov_i'
  ),
  (
    8,
    '2001:A Space Odyssey(1968)',
    8.3,
    149,
    'Adventure Sci-Fi',
    'https://www.imdb.com/title/tt0062622/mediaviewer/rm3872284416/?ref_=tt_ov_i'
  ),
  (
    9,
    'Plup Fiction (1994)',
    8.9,
    154,
    'Crime Drama',
    'https://www.imdb.com/title/tt0110912/mediaviewer/rm1959546112/?ref_=tt_ov_i'
  ),
  (
    10,
    'Requiem for a Dream(2000)',
    8.3,
    102,
    'Drama',
    'https://www.imdb.com/title/tt0180093/mediaviewer/rm3305703424/?ref_=tt_ov_i'
  ),
  (
    11,
    'The Bandit(1996)',
    8.2,
    128,
    'Crime Drama Thriller',
    'https://www.imdb.com/title/tt0116231/mediaviewer/rm3335127552/?ref_=tt_ov_i'
  ),
  (
    12,
    'Barry Lyndon(1975)',
    8.1,
    185,
    'History Adventure Drama',
    'https://www.imdb.com/title/tt0072684/mediaviewer/rm1970725120/?ref_=tt_ov_i'
  ),
  (
    13,
    'Magnolia(1999)',
    8.0,
    188,
    'Drama',
    'https://www.imdb.com/title/tt0175880/mediaviewer/rm3411106304/?ref_=tt_ov_i'
  ),
  (
    14,
    'Back to the Future(1985)',
    8.5,
    116,
    'Comedy Adventure Sci-Fi',
    'https://www.imdb.com/title/tt0088763/mediaviewer/rm554638848/?ref_=tt_ov_i'
  ),
  (
    15,
    'The Shawshank Redemtion(1994)',
    9.3,
    142,
    'Drama',
    'https://www.imdb.com/title/tt0111161/mediaviewer/rm10105600/?ref_=tt_ov_i'
  ),
  (
    16,
    'Star Wars: Episode III - Revenge of the Sith(2005)',
    7.5,
    140,
    'Action Adventure Fantasy',
    'https://www.imdb.com/title/tt0121766/mediaviewer/rm4094016256/?ref_=tt_ov_i'
  ),
  (
    17,
    'Forest Gump(1994)',
    8.8,
    142,
    'Drama Romance',
    'https://www.imdb.com/title/tt0109830/mediaviewer/rm1954748672/?ref_=tt_ov_i'
  ),
  (
    18,
    'The Prestige(2006)',
    8.5,
    130,
    'Drama Mystery Thriller',
    'https://www.imdb.com/title/tt0482571/mediaviewer/rm4031813632/?ref_=tt_ov_i'
  ),
  (
    19,
    'The Lord of the Rings: The Return of the King(2003)',
    8.9,
    201,
    'Action Adventure Drama',
    'https://www.imdb.com/title/tt0167260/mediaviewer/rm584928512/?ref_=tt_ov_i'
  ),
  (
    20,
    'The Hateful Eight(2015)',
    7.8,
    168,
    'Crime Drama Mystery',
    'https://www.imdb.com/title/tt3460252/mediaviewer/rm2736055040/?ref_=tt_ov_i'
  );
Insert into show_c
VALUES(
    (
      1,
      '2022-01-01',
      '2022-01-01 10:00:00',
      '2022-01-01 12:30:00',
      1,
      1
    ),
    (
      2,
      '2022-01-02',
      '2022-01-02 09:00:00',
      '2022-01-02 11:30:00',
      1,
      2
    ),
    (
      3,
      '2022-01-03',
      '2022-01-03 10:00:00',
      '2022-01-03 12:30:00',
      2,
      2
    ),
    (
      4,
      '2022-01-04',
      '2022-01-04 11:00:00',
      '2022-01-04 13:30:00',
      1,
      1
    ),
    (
      5,
      '2022-01-05',
      '2022-01-05 12:00:00',
      '2022-01-05 14:30:00',
      2,
      1
    )
  );
INSERT into city
VALUES(
    (1, 'aa', 'aab', '10'),
    (2, 'ab', 'aab', '11'),
    (3, 'ac', 'aab', '12')
  );
INsert INTO cinema_hall
VALUES((1, 'c_abc', 10, 1), (2, 'c_abcd', 10, 2));
insert into cinema
VALUES ((1, 'c1', 1),(2.'c2'.2));