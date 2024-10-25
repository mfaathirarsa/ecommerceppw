#!/bin/bash

# Set variables
KEY_NAME="id_rsa_github"
KEY_PATH="$HOME/.ssh/$KEY_NAME"

# Prompt for GitHub email
read -rp "Enter your GitHub email: " EMAIL

# Check if the key already exists
if [[ -f "$KEY_PATH" ]]; then
  echo "An SSH key with the name $KEY_NAME already exists at $KEY_PATH."
  echo "Do you want to overwrite it? (y/n)"
  read -r response
  if [[ "$response" != "y" ]]; then
    echo "Exiting without changes."
    exit 1
  fi
fi

# Generate SSH key
echo "Generating a new SSH key for GitHub..."
ssh-keygen -t rsa -b 4096 -C "$EMAIL" -f "$KEY_PATH" -N ""

# Start the SSH agent and add the key
echo "Starting the SSH agent..."
eval "$(ssh-agent -s)"
echo "Adding the SSH key to the agent..."
ssh-add "$KEY_PATH"

# Display the public key
echo "Your SSH public key is:"
cat "$KEY_PATH.pub"

echo "------------------------"
echo "Add this key to your GitHub account (https://github.com/settings/keys)"
echo "------------------------"

# Optionally, configure SSH to use this key for GitHub
echo "Configuring SSH to use this key for GitHub..."
SSH_CONFIG="$HOME/.ssh/config"
if ! grep -q "Host github.com" "$SSH_CONFIG" 2>/dev/null; then
  {
    echo "Host github.com"
    echo "  HostName github.com"
    echo "  User git"
    echo "  IdentityFile $KEY_PATH"
  } >> "$SSH_CONFIG"
  echo "SSH config updated to use the new key for GitHub."
else
  echo "SSH config already has an entry for GitHub. Skipping configuration update."
fi

echo "All done! You can now use SSH with GitHub."
