const max_slit_items = 5;

function createHomeSectionItem(item, n) {
    const sectionItem = document.createElement('a');
    sectionItem.href = item.href;
    sectionItem.classList.add('home-section-item', 'item');

    const img = document.createElement('img');
    img.src = item.image;
    img.alt = item.alt;

    const textContainer = document.createElement('div');
    textContainer.classList.add('home-section-item-text');
    
    const title = document.createElement('div');
    title.classList.add('home-section-item-title', 'item-title');
    title.textContent = `${n} - ${item.title}`;

    if(item.description){
        var description = document.createElement('div');
        description.classList.add('home-section-item-description', 'item-description');
        description.textContent = item.description;
    }

    if(item.publisher && item.expires){
        var info = document.createElement('div');
        info.classList.add('home-section-item-info');
        info.textContent = `${item.publisher} - Ends ${item.expires}`;
    }else if(item.expires){
        var info = document.createElement('div');
        info.classList.add('home-section-item-info');
        info.textContent = `Ends ${item.expires}`;
    }else if(item.info){
        var info = document.createElement('div');
        info.classList.add('home-section-item-info');
        info.textContent = item.info;
    }

    if(item.link){
        var link = document.createElement('a');
        link.href = item.link;
        link.classList.add('home-section-item-outer-link', 'home-author');
        link.textContent = 'Visit Project';
    }

    if(item.author){
        var authorContainer = document.createElement('div');
        authorContainer.classList.add('home-section-item-author', 'item-author');
        authorContainer.innerHTML = `by&nbsp;`;

        const authorLink = document.createElement('a');
        authorLink.classList.add('home-author');
        authorLink.href = '#';
        authorLink.textContent = item.author;
        
        authorContainer.appendChild(authorLink);

        if(item.n_likes && item.n_comments){
            const likeCommentsContainer = document.createElement('div');
            likeCommentsContainer.classList.add('home-likeComments-icons');

            const likeIcon = document.createElement('i');
            likeIcon.classList.add('fa-regular', 'fa-thumbs-up', 'home-likeComments-icon');

            const likeCount = document.createElement('div');
            likeCount.classList.add('home-split-number');
            likeCount.textContent = item.n_likes;

            const commentIcon = document.createElement('i');
            commentIcon.classList.add('fa-regular', 'fa-message', 'home-likeComments-icon');

            const commentCount = document.createElement('div');
            commentCount.classList.add('home-split-number');
            commentCount.textContent = item.n_comments;

            likeCommentsContainer.appendChild(likeIcon);
            likeCommentsContainer.appendChild(likeCount);
            likeCommentsContainer.appendChild(commentIcon);
            likeCommentsContainer.appendChild(commentCount);

            authorContainer.appendChild(likeCommentsContainer);
        }

    }



    textContainer.appendChild(title);

    if(info)
        textContainer.appendChild(info);
    
    if(description)
        textContainer.appendChild(description);

    if(link)
        textContainer.appendChild(link);

    if(authorContainer)
        textContainer.appendChild(authorContainer);

    sectionItem.appendChild(img);
    sectionItem.appendChild(textContainer);

    return sectionItem;
}

function createHomeSplitItem(item) {
    const splitItem = document.createElement('a');
    splitItem.href = '#';
    splitItem.classList.add('home-split-item', 'item');

    // Creazione dell'immagine
    const img = document.createElement('img');
    img.src = item.image;
    img.alt = item.alt;

    // Contenitore del testo
    const textContainer = document.createElement('div');
    textContainer.classList.add('home-split-item-text');

    // Titolo
    const title = document.createElement('div');
    title.classList.add('home-split-item-title', 'item-title');
    title.textContent = item.title;

    // Autore
    const authorContainer = document.createElement('div');
    authorContainer.classList.add('home-split-item-author', 'item-author');

    const authorText = document.createTextNode('by\u00A0'); // \u00A0 è uno spazio non interrotto
    const authorLink = document.createElement('a');
    authorLink.classList.add('home-author');
    authorLink.href = '#';
    authorLink.textContent = item.author;

    // Icone like e commenti
    const likeCommentsContainer = document.createElement('div');
    likeCommentsContainer.classList.add('home-likeComments-icons');

    const likeIcon = document.createElement('i');
    likeIcon.classList.add('fa-regular', 'fa-thumbs-up', 'home-likeComments-icon');

    const likeCount = document.createElement('div');
    likeCount.classList.add('home-split-number');
    likeCount.textContent = item.n_likes;

    const commentIcon = document.createElement('i');
    commentIcon.classList.add('fa-regular', 'fa-message', 'home-likeComments-icon');

    const commentCount = document.createElement('div');
    commentCount.classList.add('home-split-number');
    commentCount.textContent = item.n_comments;

    // Assemblaggio degli elementi
    likeCommentsContainer.appendChild(likeIcon);
    likeCommentsContainer.appendChild(likeCount);
    likeCommentsContainer.appendChild(commentIcon);
    likeCommentsContainer.appendChild(commentCount);

    authorContainer.appendChild(authorText);
    authorContainer.appendChild(authorLink);
    authorContainer.appendChild(likeCommentsContainer);

    textContainer.appendChild(title);
    textContainer.appendChild(authorContainer);

    splitItem.appendChild(img);
    splitItem.appendChild(textContainer);

    return splitItem;
}

function fetchBoardGameBooks() {
    const maxResults = 5;
    const query = "boardgames";
    const url = `https://openlibrary.org/search.json?q=${encodeURIComponent(query)}&limit=${maxResults}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const books = data.docs;
            const booksContainer = document.querySelector("#hotBooks-section > .home-section-content");

            for (let i = 0; i < maxResults; i++) {
                const book = books[i];
                const item = {
                    href: "#",
                    image: book.cover_i
                        ? `https://covers.openlibrary.org/b/id/${book.cover_i}-M.jpg`
                        : "https://www.sullivanprovostschools.ac.tz/wp-content/themes/sullivan/assets/img/tmp/placeholder.jpg", // Placeholder se non c'è copertina
                    alt: book.title || "Titolo non disponibile",
                    title: book.title || "Titolo non disponibile",
                    author: book.author_name ? book.author_name[0] : "Autore non disponibile",
                    n_likes: 20,
                    n_comments: 30,
                };

                const sectionItem = createHomeSectionItem(item, i + 1);
                booksContainer.appendChild(sectionItem);
            }
        })
        .catch(error => console.error("Errore nella richiesta API:", error));
}

function fetchBoardGameVideos() {
    const apiKey = youtube_api_key || "secret";
    const query = "board games";
    const maxResults = 5;
    const url = `https://www.googleapis.com/youtube/v3/search?part=snippet&type=video&q=${encodeURIComponent(query)}&maxResults=${maxResults}&key=${apiKey}&videoEmbeddable=true&videoDuration=medium`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const videos = data.items;
            const videosContainer = document.querySelector("#hotVideos-section > .home-section-content");

            for (let i = 0; i < maxResults; i++) {
                const video = videos[i];
                const item = {
                    href: `https://www.youtube.com/watch?v=${video.id.videoId}`,
                    image: video.snippet.thumbnails.medium.url,
                    alt: video.snippet.title,
                    title: video.snippet.title,
                    author: video.snippet.channelTitle,
                    n_likes: 15,
                    n_comments: 50,
                };

                const sectionItem = createHomeSectionItem(item, i + 1);
                videosContainer.appendChild(sectionItem);
            }
        })
        .catch(error => console.error("Errore nella richiesta API di YouTube:", error));
}



const hotnessContent = document.querySelector('#hot-section > .home-section-content');
const crowdfundingContent = document.querySelector('#crowdfunding-section > .home-section-content');
const videoContent = document.querySelector('#videos-section > .home-section-content');
const bestsellerContent = document.querySelector('#bestseller-section > .home-section-content');
const givewayContent = document.querySelector('#giveway-section > .home-section-content');
const mostPlayedContent = document.querySelector('#mostPlayed-section > .home-section-content');
const deepReviewsContent = document.querySelector('#deepReviews-section > .home-section-content');
const geeklistContent = document.querySelector('#geeklist-section > .home-section-content');
const hotVideosContent = document.querySelector('#hotVideos-section > .home-section-content');
const booksContent = document.querySelector('#hotBooks-section > .home-section-content');

const bgNewsContent = document.querySelector('#home-news-split > .home-split-content');
const discussionContent = document.querySelector('#home-discussion-split > .home-split-content');
const blogsContent = document.querySelector('#home-blogs-split > .home-split-content');
const forumsContent = document.querySelector('#home-forums-split > .home-split-content');



// const homeSectionContents = document.querySelectorAll('.home-section-content');
// 
// for (let i = 0; i < homeSectionContents.length; i++) {
//     const content = homeSectionContents[i];
//     for (let i=0; i < homeSectionItems.boardGames.length; i++) {
//         const item = homeSectionItems.boardGames[i];
//         //console.log("Loaded " + item.title)
//         const sectionItem = createHomeSectionItem(item, i + 1);
//         content.appendChild(sectionItem);
//     }
// }



for (let i=0; i < homeSectionItems.boardGames.length; i++) {
    const item = homeSectionItems.boardGames[i];
    //console.log("Loaded " + item.title)
    const sectionItem = createHomeSectionItem(item, i + 1);
    hotnessContent.appendChild(sectionItem);
}

for (let i=0; i < homeSectionItems.crowdfunding.length; i++) {
    const item = homeSectionItems.crowdfunding[i];
    //console.log("Loaded " + item.title)
    const sectionItem = createHomeSectionItem(item, i + 1);
    crowdfundingContent.appendChild(sectionItem);
}

for (let i=0; i < homeSectionItems.videos.length; i++) {
    const item = homeSectionItems.videos[i];
    //console.log("Loaded " + item.title)
    const sectionItem = createHomeSectionItem(item, i + 1);
    videoContent.appendChild(sectionItem);
}

for (let i=0; i < homeSectionItems.bestseller.length; i++) {
    const item = homeSectionItems.bestseller[i];
    //console.log("Loaded " + item.title)
    const sectionItem = createHomeSectionItem(item, i + 1);
    bestsellerContent.appendChild(sectionItem);
}

for (let i=0; i < homeSectionItems.giveway.length; i++) {
    const item = homeSectionItems.giveway[i];
    //console.log("Loaded " + item.title)
    const sectionItem = createHomeSectionItem(item, i + 1);
    givewayContent.appendChild(sectionItem);
}

for (let i=0; i < homeSectionItems.mostPlayed.length; i++) {
    const item = homeSectionItems.mostPlayed[i];
    //console.log("Loaded " + item.title)
    const sectionItem = createHomeSectionItem(item, i + 1);
    mostPlayedContent.appendChild(sectionItem);
}

for (let i=0; i < homeSectionItems.deepReviews.length; i++) {
    const item = homeSectionItems.deepReviews[i];
    //console.log("Loaded " + item.title)
    const sectionItem = createHomeSectionItem(item, i + 1);
    deepReviewsContent.appendChild(sectionItem);
}

for (let i=0; i < homeSectionItems.geeklist.length; i++) {
    const item = homeSectionItems.geeklist[i];
    //console.log("Loaded " + item.title)
    const sectionItem = createHomeSectionItem(item, i + 1);
    geeklistContent.appendChild(sectionItem);
}


for (let i=0; i < homeSplitItems.boardGameNews.length; i++) {
    const item = homeSplitItems.boardGameNews[i];
    //console.log("Loaded " + item.title)
    const sectionItem = createHomeSplitItem(item);
    bgNewsContent.appendChild(sectionItem);

    if (i + 1 < max_slit_items) {
        const hrItem = document.createElement('hr');
        hrItem.classList.add('home-split-item-hr');
        bgNewsContent.appendChild(hrItem);
    }
}

for (let i=0; i < homeSplitItems.hotDiscussion.length; i++) {
    const item = homeSplitItems.hotDiscussion[i];
    //console.log("Loaded " + item.title)
    const sectionItem = createHomeSplitItem(item);
    discussionContent.appendChild(sectionItem);

    if (i + 1 < max_slit_items) {
        const hrItem = document.createElement('hr');
        hrItem.classList.add('home-split-item-hr');
        discussionContent.appendChild(hrItem);
    }
}

for (let i=0; i < homeSplitItems.blogs.length; i++) {
    const item = homeSplitItems.blogs[i];
    //console.log("Loaded " + item.title)
    const sectionItem = createHomeSplitItem(item);
    blogsContent.appendChild(sectionItem);

    if (i + 1 < max_slit_items) {
        const hrItem = document.createElement('hr');
        hrItem.classList.add('home-split-item-hr');
        blogsContent.appendChild(hrItem);
    }
}

for (let i=0; i < homeSplitItems.forums.length; i++) {
    const item = homeSplitItems.forums[i];
    //console.log("Loaded " + item.title)
    const sectionItem = createHomeSplitItem(item);
    forumsContent.appendChild(sectionItem);

    if (i + 1 < max_slit_items) {
        const hrItem = document.createElement('hr');
        hrItem.classList.add('home-split-item-hr');
        forumsContent.appendChild(hrItem);
    }
}


fetchBoardGameBooks();

fetchBoardGameVideos();
