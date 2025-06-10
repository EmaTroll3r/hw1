
const rankItems = document.querySelectorAll('.game-infoPanel-rank-item a');
const gameImage = document.querySelector('#game-infoPanel-mainImage');
const averageRating = document.querySelector('#game-infoPanel-info-rating-value');
const gameTitle = document.querySelector('#game-infoPanel-info-title');
const gameYear = document.querySelector('#game-infoPanel-info-year');
const gameDescription = document.querySelector('#game-infoPanel-info-description');
const infoAnalysisRating = document.querySelector('#game-infoPanel-info-AnalysisCounts-ratingsCounts-value');
const infoAnalysisComments = document.querySelector('#game-infoPanel-info-AnalysisCounts-commentsCounts-value');
const n_players = document.querySelector('#game-infoPanel-gameplay-players-value');
const n_playersCommunity = document.querySelector('#game-infoPanel-gameplay-playersCommunity-value');
const n_playersBest = document.querySelector('#game-infoPanel-gameplay-playersBest-value');
const playingTime = document.querySelector('#game-infoPanel-gameplay-time-value');
const minAge = document.querySelector('#game-infoPanel-gameplay-age-value');
const minAgeCommunity = document.querySelector('#game-infoPanel-gameplay-ageCommunity-value');
const weight = document.querySelector('#game-infoPanel-gameplay-weight-value');
const alternativeNames = document.querySelector('#game-infoPanel-credits-item-alternativeNames');
const designers = document.querySelector('#game-infoPanel-credits-item-designers');
const artists = document.querySelector('#game-infoPanel-credits-item-artists');
const publishers = document.querySelector('#game-infoPanel-credits-item-publishers');
const likesButton = document.querySelector('#game-infoPanel-button-likes-value');
const mediaContainer = document.querySelector('#game-media-container');
const mainDescription = document.querySelector('#game-description-main-content');
const awards = document.querySelector('#game-description-honors-content');
const owners = document.querySelector('#game-description-stats-owners');
const bggID = document.querySelector('#game-description-stats-bggItemId-value');
const tagsType = document.querySelector('#game-description-tags-type + .game-description-tags-wrapper');
const tagsCategory = document.querySelector('#game-description-tags-category + .game-description-tags-wrapper');
const tagsMechanism = document.querySelector('#game-description-tags-mechanism + .game-description-tags-wrapper');
const tagsFamily = document.querySelector('#game-description-tags-family + .game-description-tags-wrapper');
const videoReview = document.querySelector('#game-videos-columun-review');
const videoIstructions = document.querySelector('#game-videos-columun-istructions');
const videoLast = document.querySelector('#game-videos-columun-last');
const seeAllButtonVideo = document.querySelector('#game-videos-buttons-seeAll');
const reviewHotContainer = document.querySelector('#game-list-section-hotReviews');
const reviewRecentContainer = document.querySelector('#game-list-section-recentReviews');
const seeAllButtonTextReview = document.querySelector('#game-reviews-buttons-SeeAllTextReview');
const seeAllButtonVideoReview = document.querySelector('#game-reviews-buttons-SeeAllVideoReview');
const releatedBoardgamesContainer = document.querySelector('#game-suggestions-content');
const seeAllButtonReleatedGames = document.querySelector('#game-suggestions-buttons-seeAll');
const forumHotContainer = document.querySelector('#game-forums-hot');
const forumRecentContainer = document.querySelector('#game-forums-recents');
const seeAllButtonForum = document.querySelector('#game-forums-buttons-seeAll');
const filesTopContainer = document.querySelector('#game-files-topFiles');
const filesRecentsContainer = document.querySelector('#game-files-recents');
const seeAllButtonFiles = document.querySelector('#game-files-buttons-seeAll');
const expansionsNumber = document.querySelector('#game-expansions-item-number');
const versionsNumber = document.querySelector('#game-versions-item-number');
const bggNewsNumber = document.querySelector('#game-bggNews-item-number');
const expansionsRowExpansions = document.querySelector("#game-expansions-item-expansions");
const expansionsRowVersions = document.querySelector("#game-expansions-item-versions");
const expansionsRowBggNews = document.querySelector("#game-expansions-item-news");
const gameBuyContainer = document.querySelector('#game-buy-stores-content');


const domain = "http://localhost:8080/bgg/"


function onResponse(response) {
    return response.json();
}

const params = new URLSearchParams(window.location.search);
const gameId = params.get('id');

fetch('http://localhost:8080/bgg/backend/getGameData.php?gameId=' + gameId)
.then(onResponse)
.then(buildPage);


function addPersonLink(container, name, linkUrl, addSeparator) {
    const link = document.createElement('a');
    link.className = 'underlined-link';
    link.href = linkUrl;
    link.textContent = name;
    
    container.appendChild(link);

    if (addSeparator) {
        const separator = document.createElement('span');
        separator.innerHTML = ',&nbsp;';
        container.appendChild(separator);
    }
}

function addImage(imageUrl, imageLink, mediaContainer) {

    const link = document.createElement('a');
    link.className = 'game-media-item';
    link.href = imageLink;
    

    const img = document.createElement('img');
    img.src = imageUrl;
    img.alt = 'Media';
    

    link.appendChild(img);
    mediaContainer.appendChild(link);
}

function addDescription(text,container) {
    const paragraph = document.createElement('p');
    paragraph.innerHTML = text.replace(/\n/g, '<br>');    
    container.appendChild(paragraph);
}

function addAwardItem(awardText, awardLink, container) {
    const newAwardItem = document.createElement('a');
    newAwardItem.href = awardLink;
    newAwardItem.className = 'game-description-honors-item dotted-underlined-link';
    newAwardItem.textContent = awardText;

    container.appendChild(newAwardItem);
}

function setOfficialLink(officialLink, name) {
    const primaryLink = document.querySelector('#game-description-officialLinks-primaryLink');
    const secondaryLink = document.querySelector('#game-description-officialLinks-secondaryLink');
    primaryLink.href = officialLink;
    primaryLink.target = "_blank";
    primaryLink.textContent = name;
    secondaryLink.href = officialLink;
    secondaryLink.textContent = "(" + officialLink.replace("https://", "").split('/')[0] + ")";
    secondaryLink.target = "_blank";
}


function formatBigNumber(value) {
    if (value >= 1000 && value < 10000) {
        return (value / 1000).toFixed(1) + 'K';
    }
    else if (value >= 10000) {
        return parseInt(value / 1000) + 'K';
    }
    return value.toString();
}

function addClassificationTag(tagText, tagLink, container) {

    const newTag = document.createElement('a');
    newTag.className = 'game-description-tags-item underlined-link';
    newTag.href = tagLink || '#';
    newTag.textContent = tagText;
    
    container.appendChild(newTag);
}

function addVideoItem(videoData, container) {

    const videoWrapper = document.createElement('a');
    videoWrapper.className = 'game-videos-column-wrapper';
    videoWrapper.href = domain + "video.php?media_id=" + videoData.id || '#';
    
    const img = document.createElement('img');
    img.className = 'game-videos-img';
    img.src = videoData.thumbnail;
    img.alt = videoData.title;
    
    const mainText = document.createElement('a');
    mainText.className = 'game-videos-mainText game-bold-blue-title-link underlined-link';
    mainText.href = domain + "video.php?media_id=" + videoData.id || '#';
    mainText.textContent = videoData.title;
    
    const descriptionWrapper = document.createElement('div');
    descriptionWrapper.className = 'game-videos-description-wrapper';
    
    const tag = document.createElement('a');
    tag.className = 'game-tag';
    tag.href = '#';
    tag.textContent = videoData.category;

    const author = document.createElement('a');
    author.className = 'game-videos-description-author game-videos-description-text game-permanent-blueLink';
    author.href = '#';
    author.textContent = videoData.author;
    
    const separator1 = document.createElement('hr');
    separator1.className = 'game-list-description-separator-hr';
    
    const publishDate = document.createElement('a');
    publishDate.className = 'game-videos-description-publishDate game-videos-description-text game-permanent-blueLink';
    publishDate.href = '#';
    publishDate.textContent = formatPublishDate(videoData.publishDate);

    const separator2 = document.createElement('hr');
    separator2.className = 'game-list-description-separator-hr';

    const language = document.createElement('div');
    language.className = 'game-videos-description-language game-videos-description-text';
    language.textContent = videoData.language;

    descriptionWrapper.appendChild(tag);
    descriptionWrapper.appendChild(author);
    descriptionWrapper.appendChild(separator1);
    descriptionWrapper.appendChild(publishDate);
    descriptionWrapper.appendChild(separator2);
    descriptionWrapper.appendChild(language);
    
    const iconsContainer = document.createElement('div');
    iconsContainer.className = 'game-icons-container game-permanent-blueLink';
    
    const likeIcon = document.createElement('i');
    likeIcon.className = 'fa-solid fa-thumbs-up game-icon';
    const likeNumber = document.createElement('div');
    likeNumber.className = 'game-icon-number';
    likeNumber.textContent = videoData.likes || '0';

    const iconSeparator = document.createElement('hr');
    iconSeparator.className = 'game-icons-container-vertical-hr';

    const commentIcon = document.createElement('i');
    commentIcon.className = 'fa-solid fa-message game-icon';
    const commentNumber = document.createElement('div');
    commentNumber.className = 'game-icon-number';
    commentNumber.textContent = videoData.comments || '0';

    iconsContainer.appendChild(likeIcon);
    iconsContainer.appendChild(likeNumber);
    iconsContainer.appendChild(iconSeparator);
    iconsContainer.appendChild(commentIcon);
    iconsContainer.appendChild(commentNumber);

    videoWrapper.appendChild(img);
    videoWrapper.appendChild(mainText);
    videoWrapper.appendChild(descriptionWrapper);
    videoWrapper.appendChild(iconsContainer);

    container.appendChild(videoWrapper);
}

function addReviewItem(reviewData, container, addFinalSeparator) {
    const reviewItem = document.createElement('div');
    reviewItem.className = 'game-list-section-item';
    
    const iconsContainer = document.createElement('a');
    iconsContainer.className = 'game-icons-container game-permanent-blueLink';
    iconsContainer.href = domain + "forum.php?id=" + reviewData.id;
    
    const likeIcon = document.createElement('i');
    likeIcon.className = 'fa-solid fa-thumbs-up game-icon';
    const likeNumber = document.createElement('div');
    likeNumber.className = 'game-icon-number';
    likeNumber.textContent = reviewData.likes || '0';
    
    const iconSeparator = document.createElement('hr');
    iconSeparator.className = 'game-icons-container-vertical-hr';
    
    const commentIcon = document.createElement('i');
    commentIcon.className = 'fa-solid fa-message game-icon';
    const commentNumber = document.createElement('div');
    commentNumber.className = 'game-icon-number';
    commentNumber.textContent = reviewData.comments || '0';
    
    iconsContainer.appendChild(likeIcon);
    iconsContainer.appendChild(likeNumber);
    iconsContainer.appendChild(iconSeparator);
    iconsContainer.appendChild(commentIcon);
    iconsContainer.appendChild(commentNumber);
    
    if (reviewData.authorImage) {
        var authorImg = document.createElement('a');
        authorImg.className = 'game-list-section-item-authorImg';
        authorImg.href = domain + "user.php?id=" + reviewData.authorId;
        const img = document.createElement('img');
        img.src = reviewData.authorImage;
        img.alt = reviewData.author;
        authorImg.appendChild(img);
    }
    
    const reviewContent = document.createElement('div');
    reviewContent.className = 'game-list-section-item-content';
    
    const reviewTitle = document.createElement('a');
    reviewTitle.className = 'game-list-section-item-title game-bold-blue-title-link underlined-link';
    reviewTitle.href = domain + "forum.php?id=" + reviewData.id;
    reviewTitle.textContent = reviewData.title;
    
    const authorWrapper = document.createElement('div');
    authorWrapper.className = 'game-list-section-item-wrapper';
    
    if (reviewData.tag) {
        var tag = document.createElement('a');
        tag.className = 'game-tag';
        tag.href = domain + "forums.php?id=" + gameId + "&tag=" + reviewData.tag;
        tag.textContent = reviewData.tag;
    }

    const authorName = document.createElement('a');
    authorName.className = 'game-list-section-item-author game-videos-description-text game-permanent-blueLink';
    authorName.href = domain + "user.php?id=" + reviewData.authorId;
    authorName.textContent = reviewData.author;
    
    const space = document.createElement('span');
    space.innerHTML = '&nbsp;';
    
    if (reviewData.publishedReviews){
        var publishedReviews = document.createElement('div');
        publishedReviews.className = 'game-list-section-item-NpublishedReviews game-videos-description-text';
        publishedReviews.dataset.NpublishedReviews =  reviewData.publishedReviews;
    }   

    const separator = document.createElement('hr');
    separator.className = 'game-list-description-separator-hr';
    
    const publishDate = document.createElement('a');
    publishDate.className = 'game-list-section-item-publishDate game-videos-description-text game-permanent-blueLink';
    publishDate.href = domain + "forum.php?id=" + reviewData.id;
    publishDate.textContent = formatPublishDate(reviewData.publishDate);
    // publishDate.textContent = reviewData.publishDate;
    
    if (reviewData.tag)
        authorWrapper.appendChild(tag);
    authorWrapper.appendChild(authorName);
    authorWrapper.appendChild(space);
    if (reviewData.publishedReviews)
        authorWrapper.appendChild(publishedReviews);
    authorWrapper.appendChild(separator);
    authorWrapper.appendChild(publishDate);
    
    reviewContent.appendChild(reviewTitle);
    reviewContent.appendChild(authorWrapper);
    
    reviewItem.appendChild(iconsContainer);

    if(reviewData.authorImage)
        reviewItem.appendChild(authorImg);
    
    reviewItem.appendChild(reviewContent);
    
    container.appendChild(reviewItem);

    if (addFinalSeparator) {
        const finalSeparator = document.createElement('hr');
        finalSeparator.className = 'game-list-section-item-hr';
        container.appendChild(finalSeparator);
    }
}

function addReleatedGameItem(suggestionData, container) {
    const suggestionItem = document.createElement('a');
    suggestionItem.className = 'game-suggestions-item';
    suggestionItem.href = domain + "game.php?id=" + suggestionData.id;
    
    const img = document.createElement('img');
    img.className = 'game-suggestions-item-img';
    img.src = suggestionData.image;
    img.alt = suggestionData.title;
    
    const content = document.createElement('div');
    content.className = 'game-suggestions-item-content';
    
    const title = document.createElement('div');
    title.className = 'game-suggestions-item-text game-bold-blue-title-link underlined-link';
    title.textContent = suggestionData.title;
    
    const iconsContainer = document.createElement('div');
    iconsContainer.className = 'game-suggestions-item-icons game-icons-container';
    
    const crownWrapper = document.createElement('div');
    crownWrapper.className = 'game-suggestions-item-icons-wrapper';
    
    const crownIcon = document.createElement('i');
    crownIcon.className = 'fa-solid fa-crown game-icon';
    
    const crownNumber = document.createElement('div');
    crownNumber.className = 'game-icon-number';
    crownNumber.textContent = suggestionData.rank || '0';
    
    crownWrapper.appendChild(crownIcon);
    crownWrapper.appendChild(crownNumber);
    
    const heartWrapper = document.createElement('div');
    heartWrapper.className = 'game-suggestions-item-icons-wrapper';
    
    const heartIcon = document.createElement('i');
    heartIcon.className = 'fa-solid fa-heart game-icon';
    
    const heartNumber = document.createElement('div');
    heartNumber.className = 'game-icon-number';
    heartNumber.textContent = suggestionData.likes || '0';
    
    heartWrapper.appendChild(heartIcon);
    heartWrapper.appendChild(heartNumber);
    
    iconsContainer.appendChild(crownWrapper);
    iconsContainer.appendChild(heartWrapper);
    
    content.appendChild(title);
    content.appendChild(iconsContainer);
    
    suggestionItem.appendChild(img);
    suggestionItem.appendChild(content);
    
    container.appendChild(suggestionItem);
}

function addFileItem(fileData, container, addFinalSeparator) {
    const item = document.createElement('div');
    item.className = 'game-list-section-item';

    const icons = document.createElement('a');
    icons.className = 'game-icons-container game-permanent-blueLink';
    icons.href = domain + "file.php?id=" + fileData.id || '#';

    const likeIcon = document.createElement('i');
    likeIcon.className = 'fa-solid fa-thumbs-up';
    const likeNum = document.createElement('div');
    likeNum.className = 'game-icon-number';
    likeNum.textContent = fileData.likes || '0';

    const iconSep = document.createElement('hr');
    iconSep.className = 'game-icons-container-vertical-hr';

    const commentIcon = document.createElement('i');
    commentIcon.className = 'fa-solid fa-message';
    const commentNum = document.createElement('div');
    commentNum.className = 'game-icon-number';
    commentNum.textContent = fileData.comments || '0';

    icons.appendChild(likeIcon);
    icons.appendChild(likeNum);
    icons.appendChild(iconSep);
    icons.appendChild(commentIcon);
    icons.appendChild(commentNum);

    const content = document.createElement('div');
    content.className = 'game-list-section-item-content';

    const titleWrapper = document.createElement('div');
    titleWrapper.className = 'game-list-section-item-title-wrapper';

    const fileType = document.createElement('a');
    fileType.className = 'game-list-section-item-fileTypeTag game-permanent-blueLink';
    fileType.href = domain + "file.php?id=" + fileData.id;
    fileType.textContent = fileData.fileType || 'pdf';

    const title = document.createElement('a');
    title.className = 'game-list-section-item-title game-bold-blue-title-link underlined-link';
    title.href = domain + "file.php?id=" + fileData.id;
    title.textContent = fileData.title;

    titleWrapper.appendChild(fileType);
    titleWrapper.appendChild(title);

    const desc = document.createElement('div');
    desc.className = 'game-list-section-item-description';
    desc.textContent = fileData.description;

    const infoWrapper = document.createElement('div');
    infoWrapper.className = 'game-list-section-item-wrapper';

    const author = document.createElement('a');
    author.className = 'game-list-section-item-author game-videos-description-text game-permanent-blueLink';
    author.href = domain + "user.php?id=" + fileData.authorId;
    author.textContent = fileData.author;

    const sep1 = document.createElement('hr');
    sep1.className = 'game-list-description-separator-hr';

    const pubDate = document.createElement('a');
    pubDate.className = 'game-list-section-item-publishDate game-videos-description-text game-permanent-blueLink';
    pubDate.href = domain + "file.php?id=" + fileData.id;
    pubDate.textContent = fileData.publishDate;

    const sep2 = document.createElement('hr');
    sep2.className = 'game-list-description-separator-hr';

    const lang = document.createElement('div');
    lang.className = 'game-list-section-item-language game-videos-description-text';
    lang.textContent = fileData.language;

    infoWrapper.appendChild(author);
    infoWrapper.appendChild(sep1);
    infoWrapper.appendChild(pubDate);
    infoWrapper.appendChild(sep2);
    infoWrapper.appendChild(lang);

    content.appendChild(titleWrapper);
    content.appendChild(desc);
    content.appendChild(infoWrapper);

    item.appendChild(icons);
    item.appendChild(content);

    container.appendChild(item);

    if (addFinalSeparator) {
        const finalSeparator = document.createElement('hr');
        finalSeparator.className = 'game-list-section-item-hr';
        container.appendChild(finalSeparator);
    }
}

function formatPublishDate(dateString) {
    const date = new Date(dateString);
    const now = new Date();
    const diffMs = now - date;
    const diffSec = Math.floor(diffMs / 1000);
    const diffMin = Math.floor(diffSec / 60);
    const diffHour = Math.floor(diffMin / 60);
    const diffDay = Math.floor(diffHour / 24);
    const diffMonth = Math.floor(diffDay / 30);
    const diffYear = Math.floor(diffDay / 365);

    if (diffYear > 0) return diffYear === 1 ? "1 year ago" : `${diffYear} years ago`;
    if (diffMonth > 0) return diffMonth === 1 ? "1 month ago" : `${diffMonth} months ago`;
    if (diffDay > 0) return diffDay === 1 ? "1 day ago" : `${diffDay} days ago`;
    if (diffHour > 0) return diffHour === 1 ? "1 hour ago" : `${diffHour} hours ago`;
    if (diffMin > 0) return diffMin === 1 ? "1 minute ago" : `${diffMin} minutes ago`;
    return "just now";
}

function buildPage(json) {
    gameImage.src = json.boardgame.image_url;
    
    for (let item of rankItems) {
        item.dataset.value = json.boardgame.bgg_rank;
    }

    averageRating.dataset.value = json.boardgame.average_rating;
    
    gameTitle.dataset.value = json.boardgame.name;

    gameYear.dataset.value = "(" + json.boardgame.year_published + ")";

    gameDescription.dataset.value = json.boardgame.small_description;

    infoAnalysisRating.dataset.value = formatBigNumber(json.boardgame.num_ratings);
    infoAnalysisComments.dataset.value = formatBigNumber(json.boardgame.num_comments);

    if (json.boardgame.min_players === json.boardgame.max_players) {
        n_players.dataset.value = json.boardgame.min_players;
        n_playersCommunity.dataset.value = json.boardgame.min_players;
        n_playersBest.dataset.value = json.boardgame.min_players;
    }else {
        n_players.dataset.value = json.boardgame.min_players + ' - ' + json.boardgame.max_players;
        n_playersCommunity.dataset.value = json.boardgame.min_players + ' - ' + json.boardgame.max_players;
        n_playersBest.dataset.value = json.boardgame.min_players + ' - ' + json.boardgame.max_players;
    }

    playingTime.dataset.value = json.boardgame.playing_time

    minAge.dataset.value = json.boardgame.min_age + '+';
    minAgeCommunity.dataset.value = json.boardgame.min_age + '+';

    weight.dataset.value = json.boardgame.complexity_rating;

    for (let i=0; i < json.alternativeNames.length; i++) {
        addPersonLink(alternativeNames, json.alternativeNames[i].name, '#', i < json.alternativeNames.length - 1);
    }

    for (let i=0; i < json.designers.length; i++) {
        const link = domain + "person.php?id=" + json.designers[i].id
        addPersonLink(designers, json.designers[i].name, link, i < json.designers.length - 1);
    }    

    for (let i=0; i < json.artists.length; i++) {
        const link = domain + "person.php?id=" + json.artists[i].id
        addPersonLink(artists, json.artists[i].name, link, i < json.artists.length - 1);
    }    

    for (let i=0; i < json.publishers.length; i++) {
        const link = domain + "person.php?id=" + json.publishers[i].id
        addPersonLink(publishers, json.publishers[i].name, link, i < json.publishers.length - 1);
    }    

    likesButton.dataset.value = formatBigNumber(json.boardgame.n_likes);

    for(let i=0; i < json.images.length; i++) {
        const link = domain + "image.php?id=" + json.images[i].id;
        addImage(json.images[i].uri, link, mediaContainer);
    }

    if(json.images.length >= 10){
        const moreLink = document.querySelector("#game-media-seeAll");
        moreLink.dataset.totalImages = json.nImages.count;
        moreLink.href = domain + "images.php?id=" + gameId;
        moreLink.classList.remove('hidden');
    }

    addDescription(json.boardgame.description, mainDescription);
    
    
    for(let i=0; i < json.awards.length; i++) {
        const link = domain + "award.php?id=" + json.awards[i].id + "&year=" + json.awards[i].year_won;
        addAwardItem(json.awards[i].year_won + ' ' + json.awards[i].name, link, awards);
    }

    setOfficialLink(json.boardgame.official_link, json.boardgame.official_link_alt);

    owners.dataset.value = formatBigNumber(json.boardgame.owners);

    bggID.dataset.value = json.boardgame.id;

    for(let i=0; i < json.tags.length; i++) {
        let tagContainer;
        if (json.tags[i].category_type === 'type') {
            tagContainer = tagsType;
        }else if (json.tags[i].category_type === 'category') {
            tagContainer = tagsCategory;
        }else if (json.tags[i].category_type === 'mechanism') {
            tagContainer = tagsMechanism;
        }else if (json.tags[i].category_type === 'family') {
            tagContainer = tagsFamily;
        }

        const link = domain + "tag.php?id=" + json.tags[i].id;
        addClassificationTag(json.tags[i].name, link, tagContainer);
    }

    fetch('http://localhost:8080/bgg/backend/getEbayPrice.php?item=' + json.boardgame.name + ' board game')
    .then(onResponse)
    .then(ebayPricing);

    addVideoItem(json.reviewVideo, videoReview);
    addVideoItem(json.istructionalVideo, videoIstructions);
    addVideoItem(json.lastVideo, videoLast);


    seeAllButtonVideo.dataset.gameTotal = json.nVideos.count;
    seeAllButtonVideo.href = domain + "videos.php?id=" + gameId;

    for (let i=0; i < json.reviewHots.length; i++) {
        addReviewItem(json.reviewHots[i], reviewHotContainer, i < json.reviewHots.length - 1);
    }
    
    for (let i=0; i < json.reviewRecents.length; i++) {
        addReviewItem(json.reviewRecents[i], reviewRecentContainer, i < json.reviewRecents.length - 1);
    }

    seeAllButtonTextReview.dataset.gameTotal = json.nTextReviews.count;
    seeAllButtonTextReview.href = domain + "forums.php?id=" + gameId + "&tag=Reviews"

    seeAllButtonVideoReview.dataset.gameTotal = json.nVideoReviews.count;    
    seeAllButtonVideoReview.href = domain + "videos.php?id=" + gameId + "&tag=Reviews";

    for( let i=0; i < json.releatedBoardgames.length; i++) {
        addReleatedGameItem(json.releatedBoardgames[i], releatedBoardgamesContainer);
    }

    seeAllButtonReleatedGames.dataset.gameTotal = json.nReleatedBoardgames.count;


    for (let i=0; i < json.forumHots.length; i++) {
        addReviewItem(json.forumHots[i], forumHotContainer, i < json.forumHots.length - 1);
    }

    for (let i=0; i < json.forumRecents.length; i++) {
        addReviewItem(json.forumRecents[i], forumRecentContainer, i < json.forumRecents.length - 1);
    }

    seeAllButtonForum.dataset.gameTotal = json.nForums.count;
    seeAllButtonForum.href = domain + "forums.php?id=" + gameId;


    for (let i = 0; i < json.fileHots.length; i++) {
        addFileItem(json.fileHots[i], filesTopContainer, i < json.fileHots.length - 1);
    }

    for (let i = 0; i < json.fileRecents.length; i++) {
        addFileItem(json.fileRecents[i], filesRecentsContainer, i < json.fileRecents.length - 1);
    }

    seeAllButtonFiles.dataset.gameTotal = json.nFiles.count;
    seeAllButtonFiles.href = domain + "files.php?id=" + gameId;

    expansionsNumber.dataset.value = json.boardgame.n_expansions;
    expansionsRowExpansions.href = domain + "expansions.php?id=" + gameId;
    versionsNumber.dataset.value = json.boardgame.n_versions;
    expansionsRowVersions.href = domain + "versions.php?id=" + gameId;

    bggNewsNumber.dataset.value = json.nBggNews.count;
    expansionsRowBggNews.href = domain + "bggNews.php?id=" + gameId;
}

function addGameBuyItem(itemData, container, addSeparator) {
    const buyItem = document.createElement('a');
    buyItem.className = 'game-buy-item';
    buyItem.href = itemData.url || '#';
    buyItem.target = '_blank';

    const logo = document.createElement('img');
    logo.className = 'game-buy-stores-item-logo';
    logo.src = itemData.logo || 'https://upload.wikimedia.org/wikipedia/commons/4/48/EBay_logo.png';
    logo.alt = itemData.storeName || 'Store';

    const content = document.createElement('div');
    content.className = 'game-buy-item-content';

    const text = document.createElement('div');
    text.className = 'game-buy-item-text';
    text.textContent = itemData.storeName || 'eBay';

    const price = document.createElement('div');
    price.className = 'game-buy-item-price';
    price.textContent = itemData.price || '€ 0.00';

    content.appendChild(text);
    content.appendChild(price);

    buyItem.appendChild(logo);
    buyItem.appendChild(content);

    container.appendChild(buyItem);

    if (addSeparator !== false) {
        const hr = document.createElement('hr');
        container.appendChild(hr);
    }
}

function ebayPricing(json){

    const itemData = {
        url: json.items[0].url,
        logo: 'https://upload.wikimedia.org/wikipedia/commons/4/48/EBay_logo.png',
        storeName: 'eBay',
        price: json.items[0].price + ' ' + json.items[0].currency
    };

    for (let i = 1; i < 6; i++) {
        addGameBuyItem(itemData, gameBuyContainer, i < 5);
    }
}